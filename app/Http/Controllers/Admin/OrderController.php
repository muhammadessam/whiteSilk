<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Client;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderPieces;
use App\PriceList;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->canAccess('show', Order::class);
        return view('admin.orders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->canAccess('create', Order::class);
        return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->canAccess('create', Order::class);
        $request->validate([
            'type' => 'required',
            'branch_id' => 'required|exists:branches,id',
            'serial' => 'required|unique:orders,serial',
            'subscription_id' => 'required_if:type,اشتراك',
            'driver_id' => 'required'
        ]);
        // is paid
        $request['is_paid'] = $request['is_paid'] ? 1 : 0;
        $request['is_fast'] = $request['is_fast'] ? 1 : 0;
        // branch
        $branch = Branch::find($request['branch_id']);

        $client = Client::find($request['client_id']);
        $driver = User::find($request['driver_id']);

        // saving the subscription pivot for specific subscription, this is not the subscription id its the pivot id
        $subscription = $client->subscriptions()->wherePivot('id', $request['subscription_id'])->first();
        $request['pivot_id'] = $request['subscription_id'];
        $request['subscription_id'] = $subscription ? $subscription->id : null;


        // is Paid
        $request['is_paid'] = $request['is_paid'] ? 1 : 0;
        $total = 0;
        if (!$request['total']) {
            foreach ((array)$request['ids'] as $index => $id) {
                $piece = PriceList::find($id);
                $total += $request['counts'][$index] * $piece[$request['types'][$index]];
            }
            foreach ((array)$request['newNames'] as $index => $name) {
                $total += $request['newCounts'][$index] * $request['newPrices'][$index];
            }
            $request['total'] = $total;
        }
        if (!$request['number_of_Pieces']) {
            $request['number_of_Pieces'] = count((array)$request['ids']) + count((array)$request['newNames']);
        }

        if ($request['type'] == 'اشتراك') {
            if ($subscription) {
                if ($subscription->type == 'قطعة') {
                    $subscription->pivot->remaining_pieces -= $request['number_of_Pieces'];
                } elseif ($subscription->type == 'مبلغ') {
                    $subscription->pivot->credit -= $request['total'];
                } else {
                    if (now() > $subscription->pivot->start_date && now() < $subscription->pivot->end_date) {
                        if ($subscription->pieces != 0) {
                            $subscription->pivot->remaining_pieces -= $request['number_of_Pieces'];
                        }
                    } else {
                        $this->actionFailed('الاشتراك منتهي');
                        return redirect()->back();
                    }
                }
                $subscription->pivot->save();
            } else {
                $this->actionFailed('لا يوجد اشتراك صالح');
                return redirect()->back();
            }
        }

        $request['total'] -= $request['discount'];
        $order = Order::create($request->except(['ids', 'counts', 'types', 'newNames', 'newTypes', 'newCounts', 'newPrices']));
        $client->decrement('credit', $order['total']);

        foreach ((array)$request['ids'] as $index => $id) {
            $piece = PriceList::find($id);
            $order->pieces()->attach($id, [
                'price' => $piece[$request['types'][$index]] * $request['counts'][$index],
                'count' => $request['counts'][$index],
                'type' => $request['types'][$index],
                'name' => $piece['item'],
            ]);
        }
        foreach ((array)$request['newNames'] as $index => $name) {
            OrderPieces::create([
                'order_id' => $order->id,
                'name' => $name,
                'price' => $request['newPrices'][$index],
                'count' => $request['newCounts'][$index],
                'type' => $request['newTypes'][$index],
            ]);
        }

        $this->actionSuccess();
        return redirect()->route('admin.orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $this->canAccess('show', Order::class);
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $this->canAccess('edit', Order::class);
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $this->canAccess('edit', Order::class);
        $request->validate([
            'type' => 'required',
            'branch_id' => 'required|exists:branches,id',
            'serial' => 'required',
            'subscription_id' => 'required_if:type,اشتراك'
        ]);
        // is paid
        $request['is_paid'] = $request['is_paid'] ? 1 : 0;
        $request['is_fast'] = $request['is_fast'] ? 1 : 0;

        // branch
        $branch = Branch::find($request['branch_id']);

        $client = Client::find($request['client_id']);
        $driver = User::find($request['driver_id']);

        // saving the subscription pivot for specific subscription, this is not the subscription id its the pivot id
        $subscription = $client->subscriptions()->wherePivot('id', $request['subscription_id'])->first();
        $request['pivot_id'] = $request['subscription_id'];
        $request['subscription_id'] = $subscription ? $subscription->id : null;


        // is Paid
        $request['is_paid'] = $request['is_paid'] ? 1 : 0;
        $total = 0;
        if (!$request['total']) {
            foreach ((array)$request['ids'] as $index => $id) {
                $piece = PriceList::find($id);
                $total += $request['counts'][$index] * $piece[$request['types'][$index]];
            }
            foreach ((array)$request['newNames'] as $index => $name) {
                $total += $request['newCounts'][$index] * $request['newPrices'][$index];
            }
            $request['total'] = $total;
        }
        if (!$request['number_of_Pieces']) {
            $request['number_of_Pieces'] = count((array)$request['ids']) + count((array)$request['newNames']);
        }

        if ($request['type'] == 'اشتراك') {
            if ($subscription) {
                if ($subscription->type == 'قطعة') {
                    $subscription->pivot->remaining_pieces -= $request['number_of_Pieces'];
                } elseif ($subscription->type == 'مبلغ') {
                    $subscription->pivot->credit -= $request['total'];
                } else {
                    if (now() > $subscription->pivot->start_date && now() < $subscription->pivot->end_date) {
                        if ($subscription->pieces != 0) {
                            $subscription->pivot->remaining_pieces -= $request['number_of_Pieces'];
                        }
                    } else {
                        $this->actionFailed('الاشتراك منتهي');
                        return redirect()->back();
                    }
                }
                $subscription->pivot->save();
            } else {
                $this->actionFailed('لا يوجد اشتراك صالح');
                return redirect()->back();
            }
        }
        $request['total'] -= $request['discount'];
        $order->update($request->except(['ids', 'counts', 'types', 'newNames', 'newTypes', 'newCounts', 'newPrices']));

        $client->decrement('credit', $order['total']);

        foreach ((array)$request['ids'] as $index => $id) {
            $piece = PriceList::find($id);
            $order->pieces()->attach($id, [
                'price' => $piece[$request['types'][$index]] * $request['counts'][$index],
                'count' => $request['counts'][$index],
                'type' => $request['types'][$index],
                'name' => $piece['item'],
            ]);
        }
        foreach ((array)$request['newNames'] as $index => $name) {
            OrderPieces::create([
                'order_id' => $order->id,
                'name' => $name,
                'price' => $request['newPrices'][$index],
                'count' => $request['newCounts'][$index],
                'type' => $request['newTypes'][$index],
            ]);
        }

        $this->actionSuccess();
        return redirect()->route('admin.orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $this->canAccess('delete', Order::class);
        $order->delete();
        $this->actionSuccess();
        return back();
    }

    public function massDestroy(Request $request)
    {
        $this->canAccess('delete', Order::class);
        Order::whereIn('id', $request['ids'])->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Http\Controllers\Controller;
use App\Order;
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
            'ids' => 'required|array',
            'subscription_id' => 'required_if:type,اشتراك'
        ]);
        // is paid
        $request['is_paid'] = $request['is_paid'] ? 1 : 0;

        // branch
        $branch = Branch::find($request['branch_id']);
        $user = User::find($request['user_id']);
        $subscription = $user->subscriptions()->wherePivot('id', $request['subscription_id'])->first();
        $request['pivot_id'] = $request['subscription_id'];
        $request['subscription_id'] = $subscription ? $subscription->id : null;

        $total = 0;
        foreach ($request['ids'] as $index => $id) {
            $piece = PriceList::find($id);
            $total += $piece[$request['types'][$index]] * $request['counts'][$index];
        }

        if (!$request['total']) {
            if ($request['type'] == 'اشتراك') {
                $request['is_paid'] = 1;
                if ($subscription && $subscription->pivot->is_active) {
                    if ($subscription->type == 'مبلغ') {
                        $subscription->pivot->credit -= $total;
                        $request['total'] = $total;
                    } elseif ($subscription->type == 'تاريخ') {
                        if ($subscription->pieces == 0) {
                            $request['total'] = $total;
                        } else {
                            $request['total'] = $total;
                            foreach ($request['ids'] as $index => $id) {
                                $subscription->pivot->remaining_pieces -= $request['counts'][$index];
                            }
                        }
                    } else {
                        $request['total'] = $total;
                        foreach ($request['ids'] as $index => $id) {
                            $subscription->pivot->remaining_pieces -= $request['counts'][$index];
                        }
                    }
                } else {
                    toast('لا يوجد اشتراك فعال')->position('top-end');
                    return redirect()->back();
                }
            } else {
                $request['total'] = $total;
            }
        }
        $subscription ? $subscription->pivot->save() : null;
        $order = Order::create($request->except('ids', 'types', 'counts'));

        // pieces
        $pieces = PriceList::findMany($request['ids']);
        if ($request['ids'])
            foreach ($request['ids'] as $index => $id) {
                $piece = PriceList::find($id);
                $order->pieces()->attach($piece, ['count' => $request['counts'][$index], 'type' => $request['types'][$index]]);
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
            'ids' => 'required|array',
            'subscription_id' => 'required_if:type,اشتراك'
        ]);

        // is paid
        $request['is_paid'] = $request['is_paid'] ? 1 : 0;

        // branch
        $branch = Branch::find($request['branch_id']);
        $user = User::find($request['user_id']);
        $subscription = $user->subscriptions()->wherePivot('id', $request['subscription_id'])->first();
        $request['pivot_id'] = $request['subscription_id'];
        $request['subscription_id'] = $subscription ? $subscription->id : null;

        $total = 0;
        foreach ($request['ids'] as $index => $id) {
            $piece = PriceList::find($id);
            $total += $piece[$request['types'][$index]] * $request['counts'][$index];
        }

        if (!$request['total']) {
            if ($request['type'] == 'اشتراك') {
                $request['is_paid'] = 1;
                if ($subscription && $subscription->pivot->is_active) {
                    if ($subscription->type == 'مبلغ') {
                        $subscription->pivot->credit -= $total;
                        $request['total'] = $total;
                    } elseif ($subscription->type == 'تاريخ') {
                        if ($subscription->pieces == 0) {
                            $request['total'] = $total;
                        } else {
                            $request['total'] = $total;
                            foreach ($request['ids'] as $index => $id) {
                                $subscription->pivot->remaining_pieces -= $request['counts'][$index];
                            }
                        }
                    } else {
                        $request['total'] = $total;
                        foreach ($request['ids'] as $index => $id) {
                            $subscription->pivot->remaining_pieces -= $request['counts'][$index];
                        }
                    }
                } else {
                    toast('لا يوجد اشتراك فعال')->position('top-end');
                    return redirect()->back();
                }
            } else {
                $request['total'] = $total;
            }
        }
        $subscription ? $subscription->pivot->save() : null;
        $order->update($request->except('ids', 'types', 'counts'));

        // pieces
        $order->pieces()->sync([]);
        $pieces = PriceList::findMany($request['ids']);
        if ($request['ids'])
            foreach ($request['ids'] as $index => $id) {
                $piece = PriceList::find($id);
                $order->pieces()->attach($piece, ['count' => $request['counts'][$index], 'type' => $request['types'][$index]]);
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

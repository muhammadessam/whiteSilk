<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Http\Controllers\Controller;
use App\Order;
use App\PriceList;
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
            'serial' => 'required',
            'ids' => 'required|array',
            'types' => 'required|array|min:' . count($request['ids']) . '',
            'counts' => 'required|array|min:' . count($request['ids']) . '',
            'subscription_id' => 'required_if:type,اشتراك'
        ]);
        // is paid
        $request['is_paid'] = $request['is_paid'] ? 1 : 0;

        // branch
        $branch = Branch::find($request['branch_id']);
        $request['serial'] = $branch->bill_prefix . '-' . $request['serial'];

        $order = Order::create($request->except('ids','types', 'counts'));

        // pieces
        $pieces = PriceList::findMany($request['ids']);
        if ($request['ids'])
            foreach ($pieces as $piece) {

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
            'payment_method_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'address_id' => 'required|numeric',
            'total' => 'required|numeric',
            'status_id' => 'required|numeric',
            'date' => 'required|date'
        ]);
        $request['is_paid'] = $request['is_paid'] ? 1 : 0;
        $order->update($request->all());
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

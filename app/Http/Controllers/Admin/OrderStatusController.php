<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\OrderStatus;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->canAccess('show', OrderStatus::class);
        return view('admin.orderstatus.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->canAccess('create', OrderStatus::class);
        $request->validate([
            'name' => 'required'
        ]);
        OrderStatus::create($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.orderStatus.index');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\OrderStatus $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function show(OrderStatus $orderStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\OrderStatus $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderStatus $orderStatus)
    {
        $this->canAccess('edit', OrderStatus::class);
        return view('admin.orderstatus.edit', compact('orderStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\OrderStatus $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderStatus $orderStatus)
    {
        $this->canAccess('edit', OrderStatus::class);
        $request->validate([
            'name' => 'required'
        ]);
        $orderStatus->update($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.orderStatus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\OrderStatus $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderStatus $orderStatus)
    {
        $this->canAccess('delete', OrderStatus::class);
        $orderStatus->delete();
        $this->actionSuccess();
        return back();
    }

    public function massDestroy(Request $request)
    {
        $this->canAccess('delete', OrderStatus::class);
        OrderStatus::whereIn('id', $request['ids'])->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

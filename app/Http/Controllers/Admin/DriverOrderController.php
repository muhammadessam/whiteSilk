<?php

namespace App\Http\Controllers\Admin;

use App\DriverOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DriverOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->canAccess('show', DriverOrder::class);
        return view('admin.driverOrders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->canAccess('create', DriverOrder::class);
        return view('admin.driverOrders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->canAccess('create', DriverOrder::class);
        $request->validate([
            'time_id' => 'required',
            'date' => 'required',
            'status_id' => 'required',
        ]);
        DriverOrder::create($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.driver-orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param DriverOrder $driverOrder
     * @return \Illuminate\Http\Response
     */
    public function show(DriverOrder $driverOrder)
    {
        $this->canAccess('show', DriverOrder::class);
        return view('admin.driverOrders.show', compact('driverOrder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DriverOrder $driverOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(DriverOrder $driverOrder)
    {
        $this->canAccess('edit', DriverOrder::class);
        return view('admin.driverOrders.edit', compact('driverOrder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param DriverOrder $driverOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DriverOrder $driverOrder)
    {
        $this->canAccess('edit', DriverOrder::class);
        $request->validate([
            'time_id' => 'required',
            'date' => 'required',
            'status_id' => 'required',
        ]);
        $driverOrder->update($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.driver-orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DriverOrder $driverOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(DriverOrder $driverOrder)
    {
        $this->canAccess('delete', DriverOrder::class);
        $driverOrder->delete();
        $this->actionSuccess();
        return back();
    }

    public function massDestroy(Request $request)
    {
        $this->canAccess('delete', DriverOrder::class);
        DriverOrder::whereIn('id', $request['ids'])->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\DriverOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    }

    /**
     * Display the specified resource.
     *
     * @param DriverOrder $driverOrder
     * @return \Illuminate\Http\Response
     */
    public function show(DriverOrder $driverOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DriverOrder $driverOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(DriverOrder $driverOrder)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DriverOrder $driverOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(DriverOrder $driverOrder)
    {
        //
    }

    public function massDestroy(Request $request)
    {

    }
}

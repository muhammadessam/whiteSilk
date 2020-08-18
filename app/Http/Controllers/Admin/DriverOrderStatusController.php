<?php

namespace App\Http\Controllers\Admin;

use App\DriverOrderStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DriverOrderStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->canAccess('show', DriverOrderStatus::class);
        return view('admin.driverOrdersStatus.index');
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
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->canAccess('create', DriverOrderStatus::class);
        $request->validate([
            'name' => 'required'
        ]);
        DriverOrderStatus::create($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.driver-order-status.index');
    }

    /**
     * Display the specified resource.
     *
     * @param DriverOrderStatus $driverOrderStatus
     * @return \Illuminate\Http\Response
     */
    public function show(DriverOrderStatus $driverOrderStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DriverOrderStatus $driverOrderStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(DriverOrderStatus $driverOrderStatus)
    {
        $this->canAccess('edit', DriverOrderStatus::class);
        return view('admin.driverOrdersStatus.edit', compact('driverOrderStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param DriverOrderStatus $driverOrderStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DriverOrderStatus $driverOrderStatus)
    {
        $this->canAccess('edit', DriverOrderStatus::class);
        $request->validate([
            'name' => 'required'
        ]);
        $driverOrderStatus->update($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.driver-order-status.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DriverOrderStatus $driverOrderStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(DriverOrderStatus $driverOrderStatus)
    {
        $this->canAccess('delete', DriverOrderStatus::class);
        $driverOrderStatus->delete();
        $this->actionSuccess();
        return back();
    }

    public function massDestroy(Request $request)
    {
        $this->canAccess('delete', DriverOrderStatus::class);
        DriverOrderStatus::whereIn('id', $request['ids'])->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

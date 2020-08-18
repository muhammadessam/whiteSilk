<?php

namespace App\Http\Controllers\Admin;

use App\DriversTime;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DriversTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->canAccess('show', DriversTime::class);
        return view('admin.drivertimes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->canAccess('create', DriversTime::class);
        return view('admin.drivertimes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->canAccess('create', DriversTime::class);
        $request->validate([
            'from' => 'required',
            'to' => 'required',
            'max' => 'required|numeric'
        ]);
        DriversTime::create($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.drivers-times.index');

    }

    /**
     * Display the specified resource.
     *
     * @param DriversTime $driversTime
     * @return \Illuminate\Http\Response
     */
    public function show(DriversTime $driversTime)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DriversTime $driversTime
     * @return \Illuminate\Http\Response
     */
    public function edit(DriversTime $driversTime)
    {
        $this->canAccess('edit', DriversTime::class);
        return view('admin.drivertimes.edit', compact('driversTime'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param DriversTime $driversTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DriversTime $driversTime)
    {
        $this->canAccess('edit', DriversTime::class);
        $request->validate([
            'from' => 'required',
            'to' => 'required',
            'max' => 'required|numeric'
        ]);
        $driversTime->update($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.drivers-times.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DriversTime $driversTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(DriversTime $driversTime)
    {
        $this->canAccess('delete', DriversTime::class);
        $driversTime->delete();
        $this->actionSuccess();
        return back();
    }

    public function massDestroy(Request $request)
    {

    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class   AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->canAccess('show', Area::class);
        return view('admin.areas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->canAccess('create', Area::class);
        return view('admin.areas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->canAccess('create', Area::class);
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'city_id' => 'required|exists:cities,id'
        ]);
        $request['is_active'] = $request['is_active'] ? 1 : 0;
        Area::create($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.areas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Area $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Area $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        $this->canAccess('edit', Area::class);
        return view('admin.areas.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Area $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        $this->canAccess('create', Area::class);
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'city_id' => 'required|exists:cities,id'
        ]);
        $request['is_active'] = $request['is_active'] ? 1 : 0;
        $area->update($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.areas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Area $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $this->canAccess('delete', Area::class);
        $area->delete();
        $this->actionSuccess();
        return redirect()->back();
    }
}

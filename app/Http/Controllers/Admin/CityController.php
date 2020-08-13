<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->canAccess('show', City::class);
        return view('admin.cities.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->canAccess('create', City::class);
        return view('admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->canAccess('create', City::class);
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        $request['is_active'] = $request['is_active'] ? 1 : 0;
        City::create($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.cities.index');

    }

    /**
     * Display the specified resource.
     *
     * @param City $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        $this->canAccess('show', City::class);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param City $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $this->canAccess('edit', City::class);
        return view('admin.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param City $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $this->canAccess('edit', City::class);
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        $request['is_active'] = $request['is_active'] ? 1 : 0;
        $city->update($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.cities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param City $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $this->canAccess('delete', City::class);
        $city->delete();
        $this->actionSuccess();
        return redirect()->back();
    }
}

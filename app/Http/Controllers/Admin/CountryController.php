<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->canAccess('show', Country::class);
        return view('admin.countries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->canAccess('create', Country::class);
        return view('admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->canAccess('create', Country::class);
        $request->validate([
            'name' => 'required'
        ]);
        $this->storeImg($request, 'img_temp', 'Countries');
        $request['is_active'] ?? 0;
        Country::create($request->except('img_temp'));
        $this->actionsuccess();
        return redirect()->route('admin.countries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Country $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        $this->canAccess('show', Country::class);
        return view('admin.countries.show', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Country $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        $this->canAccess('edit', Country::class);

        return view('admin.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Country $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $this->canAccess('edit', Country::class);
        $request->validate([
            'name' => 'required'
        ]);
        $this->storeImg($request, 'img_temp', 'Countries');
        $request['is_active'] = $request['is_active'] ? 1 : 0;

        $country->update($request->except('img_temp'));
        $this->actionsuccess();
        return redirect()->route('admin.countries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Country $country
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Country $country)
    {
        $this->canAccess('delete', Country::class);
        $country->delete();
        return redirect()->back();
    }

    public function massDestroy(Request $request)
    {
        Country::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

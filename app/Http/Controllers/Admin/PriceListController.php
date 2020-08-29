<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PriceList;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PriceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->canAccess('show', PriceList::class);
        return view('admin.pricelist.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->canAccess('create', PriceList::class);
        return view('admin.pricelist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->canAccess('create', PriceList::class);
        $request->validate([
            'item' => 'required',
            'washing' => 'required|numeric',
            'washingAndIron' => 'required|numeric',
            'ironed' => 'required',
        ]);
        $this->storeImg($request, 'img_temp', 'PriceList');
        PriceList::create($request->except('img_temp'));
        $this->actionSuccess();
        return redirect()->route('admin.price-list.index');
    }

    /**
     * Display the specified resource.
     *
     * @param PriceList $priceList
     * @return \Illuminate\Http\Response
     */
    public function show(PriceList $priceList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PriceList $priceList
     * @return \Illuminate\Http\Response
     */
    public function edit(PriceList $priceList)
    {
        $this->canAccess('edit', PriceList::class);
        return view('admin.pricelist.edit', compact('priceList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param PriceList $priceList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PriceList $priceList)
    {
        $this->canAccess('edit', PriceList::class);
        $request->validate([
            'item' => 'required',
            'washing' => 'required|numeric',
            'washingAndIron' => 'required|numeric',
            'ironed' => 'required',
        ]);
        $this->storeImg($request, 'img_temp', 'PriceList');
        $priceList->update($request->except('img_temp'));
        $this->actionSuccess();
        return redirect()->route('admin.price-list.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PriceList $priceList
     * @return \Illuminate\Http\Response
     */
    public function destroy(PriceList $priceList)
    {
        $this->canAccess('delete', PriceList::class);
        $priceList->delete();
        $this->actionSuccess();
        return back();
    }

    public function massDestroy(Request $request)
    {
        $this->canAccess('delete', PriceList::class);
        PriceList::whereIn('id', $request['ids']);
        return \response(null, Response::HTTP_NO_CONTENT);
    }
}

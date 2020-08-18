<?php

namespace App\Http\Controllers\Admin;

use App\GiftCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GiftCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->canAccess('show', GiftCategory::class);
        return view('admin.giftcats.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->canAccess('create', GiftCategory::class);
        return view('admin.giftcats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->canAccess('create', GiftCategory::class);
        $request->validate([
            'name' => 'required',
        ]);
        $this->storeImg($request, 'img_temp', 'GiftCardsCat');
        GiftCategory::create($request->except('img_temp'));
        $this->actionSuccess();
        return redirect()->route('admin.giftCategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\GiftCategory $giftCategory
     * @return \Illuminate\Http\Response
     */
    public function show(GiftCategory $giftCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\GiftCategory $giftCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(GiftCategory $giftCategory)
    {
        $this->canAccess('edit', GiftCategory::class);
        return view('admin.giftcats.edit', compact('giftCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\GiftCategory $giftCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GiftCategory $giftCategory)
    {
        $this->canAccess('edit', GiftCategory::class);
        $request->validate([
            'name' => 'required',
        ]);
        $this->storeImg($request, 'img_temp', 'GiftCardsCat');
        $giftCategory->update($request->except('img_temp'));
        $this->actionSuccess();
        return redirect()->route('admin.giftCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\GiftCategory $giftCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(GiftCategory $giftCategory)
    {
        $this->canAccess('delete', GiftCategory::class);
        $giftCategory->delete();
        $this->actionSuccess();
        return back();
    }

    public function massDestroy(Request $request)
    {
        $this->canAccess('delete', GiftCategory::class);
        GiftCategory::whereIn('id', $request['ids'])->delete();
        return response(null, Response::HTTP_NO_CONTENT);

    }
}

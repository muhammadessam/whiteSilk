<?php

namespace App\Http\Controllers\Admin;

use App\GiftCardUsage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GiftCardUsageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->canAccess('show', GiftCardUsage::class);
        return view('admin.giftcardusage.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->canAccess('create', GiftCardUsage::class);
        return view('admin.giftcardusage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->canAccess('create', GiftCardUsage::class);
        $request->validate([
            'card_id' => 'required',
            'user_id' => 'required',
        ]);
        GiftCardUsage::create($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.giftCardUsage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param GiftCardUsage $giftCardUsage
     * @return \Illuminate\Http\Response
     */
    public function show(GiftCardUsage $giftCardUsage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param GiftCardUsage $giftCardUsage
     * @return \Illuminate\Http\Response
     */
    public function edit(GiftCardUsage $giftCardUsage)
    {
        $this->canAccess('edit', GiftCardUsage::class);
        return view('admin.giftcardusage.edit', compact('giftCardUsage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param GiftCardUsage $giftCardUsage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GiftCardUsage $giftCardUsage)
    {
        $this->canAccess('edit', GiftCardUsage::class);
        $request->validate([
            'card_id' => 'required',
            'user_id' => 'required',
        ]);
        $giftCardUsage->update($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.giftCardUsage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param GiftCardUsage $giftCardUsage
     * @return \Illuminate\Http\Response
     */
    public function destroy(GiftCardUsage $giftCardUsage)
    {
        $this->canAccess('delete', GiftCardUsage::class);
        $giftCardUsage->delete();
        $this->actionSuccess();
        return back();
    }

    public function massDestroy(Request $request)
    {
        $this->canAccess('delete', GiftCardUsage::class);
        GiftCardUsage::whereIn('id', $request['ids'])->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

}

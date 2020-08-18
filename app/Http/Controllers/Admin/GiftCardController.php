<?php

namespace App\Http\Controllers\Admin;

use App\GiftCard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GiftCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->canAccess('show', GiftCard::class);
        return view('admin.giftcards.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->canAccess('create', GiftCard::class);
        return view('admin.giftcards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->canAccess('create', GiftCard::class);
        $request->validate([
            'code' => 'required',
        ]);
        GiftCard::create($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.giftcard.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\GiftCard $giftCard
     * @return \Illuminate\Http\Response
     */
    public function show(GiftCard $giftCard)
    {
        $this->canAccess('show', GiftCard::class);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\GiftCard $giftCard
     * @return \Illuminate\Http\Response
     */
    public function edit(GiftCard $giftcard)

    {
        $this->canAccess('edit', GiftCard::class);
        return view('admin.giftcards.edit', compact('giftcard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\GiftCard $giftCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GiftCard $giftcard)
    {
        $this->canAccess('edit', GiftCard::class);
        $request->validate([
            'code' => 'required',
        ]);
        $giftcard->update($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.giftcard.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\GiftCard $giftCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(GiftCard $giftcard)
    {
        $this->canAccess('delete', GiftCard::class);
        $giftcard->delete();
        $this->actionSuccess();
        return back();
    }


    public function massDesctroy(Request $request)
    {
        $this->canAccess('delete', GiftCard::class);
        GiftCard::whereIn('id', $request['ids'])->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

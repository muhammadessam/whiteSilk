<?php

namespace App\Http\Controllers\Admin;

use App\CouponUsage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CouponUsageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->canAccess('show', CouponUsage::class);
        return view('admin.couponUsages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->canAccess('create', CouponUsage::class);
        return view('admin.couponUsages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->canAccess('create', CouponUsage::class);
        $request->validate([
            'user_id' => 'required',
            'coupon_id' => 'required',
        ]);
        CouponUsage::create($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.couponUsage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\CouponUsage $couponUsage
     * @return \Illuminate\Http\Response
     */
    public function show(CouponUsage $couponUsage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\CouponUsage $couponUsage
     * @return \Illuminate\Http\Response
     */
    public function edit(CouponUsage $couponUsage)
    {
        $this->canAccess('edit', CouponUsage::class);
        return view('admin.couponUsages.edit', compact('couponUsage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\CouponUsage $couponUsage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CouponUsage $couponUsage)
    {
        $this->canAccess('edit', CouponUsage::class);
        $request->validate([
            'user_id' => 'required',
            'coupon_id' => 'required',
        ]);
        $couponUsage->update($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.couponUsage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\CouponUsage $couponUsage
     * @return \Illuminate\Http\Response
     */
    public function destroy(CouponUsage $couponUsage)
    {
        $this->canAccess('delete', CouponUsage::class);
        $couponUsage->delete();
        $this->actionSuccess();
        return back();
    }

    public function massDestroy(Request $request)
    {
        $this->canAccess('delete', CouponUsage::class);
        CouponUsage::whereIn('id', $request['ids'])->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

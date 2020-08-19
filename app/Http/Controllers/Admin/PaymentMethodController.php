<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PaymentMethod;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->canAccess('show', PaymentMethod::class);
        return view('admin.paymentmethods.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->canAccess('create', PaymentMethod::class);
        return view('admin.paymentmethods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->canAccess('create', PaymentMethod::class);
        $request->validate([
            'name' => 'required',
        ]);
        $request['is_active'] = $request['is_active'] ? 1 : 0;
        PaymentMethod::create($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.paymentsMethod.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\PaymentMethod $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PaymentMethod $paymentsMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentMethod $paymentsMethod)
    {
        $this->canAccess('edit', PaymentMethod::class);
        return view('admin.paymentmethods.edit', compact('paymentsMethod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param PaymentMethod $paymentsMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentMethod $paymentsMethod)
    {
        $this->canAccess('edit', PaymentMethod::class);
        $request->validate([
            'name' => 'required',
        ]);
        $request['is_active'] = $request['is_active'] ? 1 : 0;
        $paymentsMethod->update($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.paymentsMethod.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PaymentMethod $paymentsMethod
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(PaymentMethod $paymentsMethod)
    {
        $this->canAccess('delete', PaymentMethod::class);
        $paymentsMethod->delete();
        $this->actionSuccess();
        return back();
    }

    public function massDestroy(Request $request)
    {
        $this->canAccess('delete', PaymentMethod::class);
        PaymentMethod::whereIn('id', $request['ids'])->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}


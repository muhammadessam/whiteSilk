<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Payment;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->canAccess('show', Payment::class);
        return view('admin.payment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->canAccess('create', Payment::class);
        return view('admin.payment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->canAccess('create', Payment::class);
        $request->validate([
            'type' => 'required',
            'value' => 'required',
        ]);
        Payment::create($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.payments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        $this->canAccess('edit', Payment::class);
        return view('admin.payment.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $this->canAccess('edit', Payment::class);
        $request->validate([
            'type' => 'required',
            'value' => 'required',
        ]);
        $payment->update($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.payments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $this->canAccess('delete', Payment::class);
        $payment->delete();
        $this->actionSuccess();
        return back();
    }

    public function massDestroy(Request $requeste)
    {
        $this->canAccess('delete', Payment::class);
        Payment::whereIn('id', $requeste['ids'])->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

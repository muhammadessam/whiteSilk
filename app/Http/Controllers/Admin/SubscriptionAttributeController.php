<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SubscriptionAttribute;
use Illuminate\Http\Request;

class SubscriptionAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->canAccess('create', SubscriptionAttribute::class);
        $request->validate([
            'key' => 'required',
            'value' => 'required',
            'subscription_id' => 'required|exists:subscriptions,id'
        ]);
        SubscriptionAttribute::create($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.subscriptions.show', $request['subscription_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param SubscriptionAttribute $subscriptionAttribute
     * @return \Illuminate\Http\Response
     */
    public function show(SubscriptionAttribute $subscriptionAttribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SubscriptionAttribute $subscriptionAttribute
     * @return \Illuminate\Http\Response
     */
    public function edit(SubscriptionAttribute $subscriptionAttribute)
    {
        return view('admin.subscriptionsattributes.edit', compact('subscriptionAttribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param SubscriptionAttribute $subscriptionAttribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubscriptionAttribute $subscriptionAttribute)
    {
        $this->canAccess('edit', SubscriptionAttribute::class);
        $request->validate([
            'key' => 'required',
            'value' => 'required',
        ]);
        $subscriptionAttribute->update($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.subscriptions.show', $subscriptionAttribute['subscription_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SubscriptionAttribute $subscriptionAttribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubscriptionAttribute $subscriptionAttribute)
    {
        $this->canAccess('delete', SubscriptionAttribute::class);
        $subscriptionAttribute->delete();
        $this->actionSuccess();
        return back();
    }
}

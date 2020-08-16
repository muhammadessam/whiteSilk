<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SubscriptionType;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubscriptionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->canAccess('show', SubscriptionType::class);
        return view('admin.subscriptiontypes.index');
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
        $this->canAccess('create', SubscriptionType::class);
        $request->validate([
            'name' => 'required'
        ]);
        SubscriptionType::create($request->all());
        $this->actionSuccess();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param SubscriptionTypeController $subscriptionType
     * @return \Illuminate\Http\Response
     */
    public function show(SubscriptionType $subscriptionType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SubscriptionTypeController $subscriptionType
     * @return \Illuminate\Http\Response
     */
    public function edit(SubscriptionType $subscriptionType)
    {
        $this->canAccess('edit', SubscriptionType::class);
        return view('admin.subscriptiontypes.edit', compact('subscriptionType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param SubscriptionTypeController $subscriptionType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubscriptionType $subscriptionType)
    {
        $this->canAccess('edit', SubscriptionType::class);
        $request->validate([
            'name' => 'required'
        ]);
        $subscriptionType->update($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.subscription-types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SubscriptionTypeController $subscriptionType
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubscriptionType $subscriptionType)
    {
        $this->canAccess('delete', SubscriptionType::class);
        $subscriptionType->delete();
        $this->actionSuccess();
        return redirect()->back();
    }

    public function massDestroy(Request $request)
    {
        $this->canAccess('delete', SubscriptionType::class);
        SubscriptionType::whereIn('id', $request['ids'])->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

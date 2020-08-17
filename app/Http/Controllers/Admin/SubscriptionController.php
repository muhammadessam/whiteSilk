<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subscription;
use App\SubscriptionAttribute;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->canAccess('show', Subscription::class);
        return view('admin.subscriptions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->canAccess('create', Subscription::class);
        return view('admin.subscriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->canAccess('create', Subscription::class);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'type_id' => ['required', 'exists:subscription_types,id'],
            'price' => 'required|numeric',
            'pieces' => 'required',
        ]);
        $this->storeImg($request, 'img_temp', 'Subscriptions');
        $newSubscription = Subscription::create($request->except('keys', 'values', 'img_temp'));
        foreach ($request['keys'] as $index => $value) {
            if ($value) {
                SubscriptionAttribute::create([
                    'key' => $value,
                    'value' => $request['values'][$index],
                    'subscription_id' => $newSubscription['id']
                ]);
            }
        }

        $this->actionSuccess();
        return redirect()->route('admin.subscriptions.index');

    }

    /**
     * Display the specified resource.
     *
     * @param Subscription $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        $this->canAccess('show', Subscription::class);
        return view('admin.subscriptions.show', compact('subscription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Subscription $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        $this->canAccess('edit', Subscription::class);
        return view('admin.subscriptions.edit', compact('subscription'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Subscription $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        $this->canAccess('edit', Subscription::class);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'type_id' => ['required', 'exists:subscription_types,id'],
            'price' => 'required|numeric',
            'pieces' => 'required',
        ]);
        $this->storeImg($request, 'img_temp', 'Subscriptions');
        $subscription->update($request->except('keys', 'values', 'img_temp'));
        $subscription->attributes()->delete();
        foreach ($request['keys'] as $index => $value) {
            if ($value) {
                SubscriptionAttribute::create([
                    'key' => $value,
                    'value' => $request['values'][$index],
                    'subscription_id' => $subscription['id']
                ]);
            }
        }

        $this->actionSuccess();
        return redirect()->route('admin.subscriptions.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Subscription $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        $this->canAccess('delete', Subscription::class);
        $subscription->delete();
        $this->actionSuccess();
        return back();
    }

    public function massDestroy(Request $request)
    {
        $this->canAccess('delete', Subscription::class);
        Subscription::whereIn('id', $request['ids'])->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

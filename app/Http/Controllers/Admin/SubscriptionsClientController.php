<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subscription;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriptionsClientController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:users,id',
            'subscription_id' => 'required|exists:subscriptions,id',
        ]);
        $client = User::find($request['client_id']);
        $subscription = Subscription::find($request['subscription_id']);

        $client->subscriptions()->attach($subscription->id,
            [
                'is_active' => true,
                'start_date' => $subscription->type == 'تاريخ' ? Carbon::now()->format('Y-m-d') : null,
                'end_date' => $subscription->type == 'تاريخ' ? Carbon::now()->addDays($subscription->days)->format('Y-m-d') : null,
                'credit' => $subscription->type == 'مبلغ' ? $subscription->added_credit : null,
                'remaining_pieces' => $subscription->pieces
            ]
        );
        $this->actionSuccess();
        return redirect()->back();

    }

    public function destroy(Request $request)
    {
        $request->validate(
            [
                'client_id' => 'required',
                'subscription_id' => 'required',
                'pivot_id' => 'required',
            ]
        );
        $user = User::find($request['client_id']);
        $subscription = Subscription::find($request['subscription_id']);
        $user->subscriptions()->wherePivot('id', $request['pivot_id'])->detach($subscription);
        $this->actionSuccess();
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $request->validate([
            'pivot_id' => 'required'
        ]);
        $obj = User::find($request['client_id'])->subscriptions()->wherePivot('id', $request['pivot_id'])->first();
        return view('admin.ClientSubscriptions.edit', [
            'data' => $obj
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'subscription_id' => 'required',
            'client_id' => 'required',
            'pivot_id' => 'required',
        ]);
        $request['is_active'] = $request['is_active'] ? 1 : 0;
        $user = User::find($request['client_id'])->subscriptions()->wherePivot('id', $request['pivot_id'])->sync([$request['subscription_id'] => [
            'is_active' => $request['is_active'],
            'credit' => $request['credit'],
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
            'remaining_pieces' => $request['remaining_pieces']
        ]]);
        $this->actionSuccess();
        return redirect()->route('admin.users.show', $request['client_id']);
    }
}

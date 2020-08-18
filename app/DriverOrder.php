<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverOrder extends Model
{
    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(DriverOrderStatus::class, 'status_id', 'id');
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'subscription_id', 'id');
    }

    public function time()
    {
        return $this->belongsTo(DriversTime::class, 'time_id', 'id');
    }
}

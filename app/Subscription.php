<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $guarded = [];

    public function attributes()
    {
        return $this->hasMany(SubscriptionAttribute::class, 'subscription_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(SubscriptionType::class, 'type_id', 'id');
    }
}

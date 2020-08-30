<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class Client extends Model
{
    use  HasRolesAndAbilities;

    protected $table = 'users';
    protected $guarded = [];
    protected $attributes = [
        'type' => 'عميل'
    ];
    protected $fillable = ['name', 'email', 'phone', 'password', 'img', 'credit'];
    protected $with = ['addresses', 'subscriptions'];

    protected static function boot()
    {
        static::addGlobalScope('client', function (Builder $builder) {
            $builder->where('type', 'عميل');
        });
        parent::boot();
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = Hash::needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class, 'subscription_user', 'client_id', 'subscription_id')
            ->withPivot('is_active', 'remaining_pieces', 'start_date', 'end_date', 'credit', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'client_id', 'id');
    }

    public function fastOrders()
    {
        return $this->hasMany(Order::class, 'client_id', 'id')->where('is_fast', 1);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'client_id', 'id');
    }
}

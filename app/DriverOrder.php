<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DriverOrder
 *
 * @property int $id
 * @property int|null $user_id
 * @property int $time_id
 * @property int|null $address_id
 * @property int|null $pieces
 * @property string $date
 * @property int $status_id
 * @property int|null $subscription_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Address|null $address
 * @property-read \App\User|null $client
 * @property-read \App\DriverOrderStatus $status
 * @property-read \App\Subscription|null $subscription
 * @property-read \App\DriversTime $time
 * @method static \Illuminate\Database\Eloquent\Builder|DriverOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DriverOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DriverOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|DriverOrder whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DriverOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DriverOrder whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DriverOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DriverOrder wherePieces($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DriverOrder whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DriverOrder whereSubscriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DriverOrder whereTimeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DriverOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DriverOrder whereUserId($value)
 * @mixin \Eloquent
 */
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

<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Order
 *
 * @property int $id
 * @property int $payment_method_id
 * @property int $user_id
 * @property int $address_id
 * @property string $total
 * @property int $status_id
 * @property int $is_paid
 * @property int|null $coupon_id
 * @property string $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Address $address
 * @property-read \App\Coupon|null $coupon
 * @property-read \App\PaymentMethod $paymentMethod
 * @property-read \App\OrderStatus $status
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereIsPaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 * @mixin \Eloquent
 * @property string $type
 * @property int $branch_id
 * @property string $serial
 * @property int|null $client_id
 * @property int|null $driver_id
 * @property int|null $subscription_id
 * @property string|null $arrived_at
 * @property string|null $out_at
 * @property-read \App\User|null $client
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereArrivedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDriverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOutAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSerial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSubscriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereType($value)
 */
class Order extends Model
{
    protected $guarded = [];
    use  SoftDeletes;


    public function scopeFast(Builder $builder)
    {
        return $builder->where('is_fast', 1);
    }

    public function scopeNormal(Builder $builder)
    {
        return $builder->where('is_fast', 0);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');

    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'status_id', 'id');
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id', 'id');
    }

    public function pieces()
    {
        return $this->belongsToMany(PriceList::class, 'order_pieces', 'order_id', 'piece_id')->withPivot('count', 'type', 'price', 'name');
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'subscription_id', 'id');
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id', 'id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    public function OrderPieces()
    {
        return $this->hasMany(OrderPieces::class, 'order_id', 'id')->where('piece_id', null);
    }


}

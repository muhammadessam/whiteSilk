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
 * @property int $is_fast
 * @property string|null $notes
 * @property int|null $pivot_id
 * @property string|null $discount
 * @property int|null $number_of_Pieces
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\OrderPieces[] $OrderPieces
 * @property-read int|null $order_pieces_count
 * @property-read \App\Branch $branch
 * @property-read \App\User|null $driver
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PriceList[] $pieces
 * @property-read int|null $pieces_count
 * @property-read \App\Subscription|null $subscription
 * @method static Builder|Order fast()
 * @method static Builder|Order normal()
 * @method static \Illuminate\Database\Query\Builder|Order onlyTrashed()
 * @method static Builder|Order whereDeletedAt($value)
 * @method static Builder|Order whereDiscount($value)
 * @method static Builder|Order whereIsFast($value)
 * @method static Builder|Order whereNotes($value)
 * @method static Builder|Order whereNumberOfPieces($value)
 * @method static Builder|Order wherePivotId($value)
 * @method static \Illuminate\Database\Query\Builder|Order withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Order withoutTrashed()
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

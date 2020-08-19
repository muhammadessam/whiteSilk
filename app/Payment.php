<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Payment
 *
 * @property int $id
 * @property string $type
 * @property string|null $name
 * @property string $value
 * @property int|null $order_id
 * @property int|null $payment_method_id
 * @property string|null $result
 * @property string|null $postCode
 * @property string|null $tranid
 * @property string|null $auth
 * @property string|null $ref
 * @property string|null $trackid
 * @property string|null $udf_1
 * @property string|null $udf_2
 * @property string|null $udf_3
 * @property string|null $udf_4
 * @property string|null $udf_5
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Order|null $order
 * @property-read \App\PaymentMethod|null $paymentMethod
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereAuth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePostCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereRef($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereTrackid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereTranid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUdf1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUdf2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUdf3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUdf4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUdf5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereValue($value)
 * @mixin \Eloquent
 */
class Payment extends Model
{
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id', 'id');
    }
}

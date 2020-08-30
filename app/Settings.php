<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Settings
 *
 * @property int $id
 * @property int|null $max_client_can_order_driver
 * @property string|null $delivery_fees_under_price
 * @property string|null $delivery_fees_under_amount
 * @property string|null $notification_date
 * @property string|null $urgent_fee
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Settings newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Settings newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Settings query()
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereDeliveryFeesUnderAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereDeliveryFeesUnderPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereMaxClientCanOrderDriver($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereNotificationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereUrgentFee($value)
 * @mixin \Eloquent
 */
class Settings extends Model
{
    protected $guarded = [];

    public static function Main()
    {
        return static::all()->first();
    }


}

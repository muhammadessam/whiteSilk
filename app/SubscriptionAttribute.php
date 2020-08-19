<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SubscriptionAttribute
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property int $subscription_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionAttribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionAttribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionAttribute whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionAttribute whereSubscriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionAttribute whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionAttribute whereValue($value)
 * @mixin \Eloquent
 */
class SubscriptionAttribute extends Model
{
    protected $guarded = [];
}

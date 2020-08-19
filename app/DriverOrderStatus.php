<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DriverOrderStatus
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DriverOrderStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DriverOrderStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DriverOrderStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|DriverOrderStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DriverOrderStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DriverOrderStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DriverOrderStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DriverOrderStatus extends Model
{
    protected $table = 'driver_order_status';
    protected $guarded = [];
}

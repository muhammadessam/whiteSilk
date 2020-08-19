<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DriversTime
 *
 * @property int $id
 * @property string $from
 * @property string $to
 * @property int $max
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DriversTime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DriversTime newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DriversTime query()
 * @method static \Illuminate\Database\Eloquent\Builder|DriversTime whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DriversTime whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DriversTime whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DriversTime whereMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DriversTime whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DriversTime whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DriversTime extends Model
{
    protected $table = 'driver_times';
    protected $guarded = [];
}

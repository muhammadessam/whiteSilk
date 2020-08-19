<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PriceList
 *
 * @property int $id
 * @property string $item
 * @property string $washing
 * @property string $washingAndIron
 * @property string $ironed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PriceList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PriceList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PriceList query()
 * @method static \Illuminate\Database\Eloquent\Builder|PriceList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PriceList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PriceList whereIroned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PriceList whereItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PriceList whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PriceList whereWashing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PriceList whereWashingAndIron($value)
 * @mixin \Eloquent
 */
class PriceList extends Model
{
    protected $table = 'pricelists';
    protected $guarded = [];
}

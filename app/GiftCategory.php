<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\GiftCategory
 *
 * @property int $id
 * @property string $name
 * @property string $amount
 * @property string $img
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCategory whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCategory whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GiftCategory extends Model
{
    protected $guarded = [];
    protected $table = 'gift_categories';
}

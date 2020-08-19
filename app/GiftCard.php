<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\GiftCard
 *
 * @property int $id
 * @property string $code
 * @property int|null $cat_id
 * @property string|null $amount
 * @property string|null $msg
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\GiftCategory|null $cat
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCard query()
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCard whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCard whereCatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCard whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCard whereMsg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCard whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GiftCard extends Model
{
    protected $guarded = [];
    protected $table = 'gift_cards';

    public function cat(){
        return $this->belongsTo(GiftCategory::class, 'cat_id', 'id');
    }
}

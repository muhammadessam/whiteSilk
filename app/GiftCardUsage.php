<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\GiftCardUsage
 *
 * @property int $id
 * @property int $card_id
 * @property int $user_id
 * @property string $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\GiftCard $card
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCardUsage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCardUsage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCardUsage query()
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCardUsage whereCardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCardUsage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCardUsage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCardUsage wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCardUsage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GiftCardUsage whereUserId($value)
 * @mixin \Eloquent
 */
class GiftCardUsage extends Model
{
    protected $guarded = [];

    public function card()
    {
        return $this->belongsTo(GiftCard::class, 'card_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

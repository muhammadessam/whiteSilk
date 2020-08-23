<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Subscription
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $img
 * @property int $is_active
 * @property string $price
 * @property string|null $pieces
 * @property int $type_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SubscriptionAttribute[] $attributes
 * @property-read int|null $attributes_count
 * @property-read \App\SubscriptionType $type
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription wherePieces($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $days
 * @property string|null $added_credit
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereAddedCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereType($value)
 */
class Subscription extends Model
{
    protected $guarded = [];

    public function attributes()
    {
        return $this->hasMany(SubscriptionAttribute::class, 'subscription_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'subscription_user', 'subscription_id', 'client_id')
            ->withPivot('is_active', 'remaining_pieces', 'start_date', 'end_date', 'credit', 'id');
    }
}

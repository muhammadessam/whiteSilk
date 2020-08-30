<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Silber\Bouncer\Database\HasRolesAndAbilities;

/**
 * App\Client
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string|null $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $img
 * @property string $credit
 * @property string $type
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Silber\Bouncer\Database\Ability[] $abilities
 * @property-read int|null $abilities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Address[] $addresses
 * @property-read int|null $addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\DriverOrder[] $driverOrders
 * @property-read int|null $driver_orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Order[] $fastOrders
 * @property-read int|null $fast_orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Silber\Bouncer\Database\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Subscription[] $subscriptions
 * @property-read int|null $subscriptions_count
 * @method static Builder|Client newModelQuery()
 * @method static Builder|Client newQuery()
 * @method static Builder|Client query()
 * @method static Builder|Client whereCreatedAt($value)
 * @method static Builder|Client whereCredit($value)
 * @method static Builder|Client whereEmail($value)
 * @method static Builder|Client whereEmailVerifiedAt($value)
 * @method static Builder|Client whereId($value)
 * @method static Builder|Client whereImg($value)
 * @method static Builder|Client whereIs($role)
 * @method static Builder|Client whereIsAll($role)
 * @method static Builder|Client whereIsNot($role)
 * @method static Builder|Client whereName($value)
 * @method static Builder|Client wherePassword($value)
 * @method static Builder|Client wherePhone($value)
 * @method static Builder|Client whereRememberToken($value)
 * @method static Builder|Client whereType($value)
 * @method static Builder|Client whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Client extends Model
{
    use  HasRolesAndAbilities;

    protected $table = 'users';
    protected $guarded = [];
    protected $attributes = [
        'type' => 'عميل'
    ];
    protected $fillable = ['name', 'email', 'phone', 'password', 'img', 'credit'];
    protected $with = ['addresses', 'subscriptions'];

    protected static function boot()
    {
        static::addGlobalScope('client', function (Builder $builder) {
            $builder->where('type', 'عميل');
        });
        parent::boot();
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = Hash::needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class, 'subscription_user', 'client_id', 'subscription_id')
            ->withPivot('is_active', 'remaining_pieces', 'start_date', 'end_date', 'credit', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'client_id', 'id');
    }

    public function fastOrders()
    {
        return $this->hasMany(Order::class, 'client_id', 'id')->where('is_fast', 1);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'client_id', 'id');
    }

    public function driverOrders()
    {
        return $this->hasMany(DriverOrder::class, 'client_id', 'id');
    }
}

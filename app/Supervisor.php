<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class Supervisor extends Model
{
    use HasRolesAndAbilities;

    protected $table = 'users';
    protected $guarded = [];

    public static function boot()
    {
        static::addGlobalScope('supervisor', function (Builder $builder) {
            $builder->where('type', 'مشرف');
        });
        parent::boot(); // TODO: Change the autogenerated stub
    }


}

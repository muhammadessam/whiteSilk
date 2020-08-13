<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}

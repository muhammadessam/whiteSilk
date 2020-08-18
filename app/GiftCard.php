<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiftCard extends Model
{
    protected $guarded = [];
    protected $table = 'gift_cards';

    public function cat(){
        return $this->belongsTo(GiftCategory::class, 'cat_id', 'id');
    }
}

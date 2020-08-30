<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\OrderPieces
 *
 * @property int $id
 * @property int $order_id
 * @property int|null $piece_id
 * @property string|null $name
 * @property string|null $price
 * @property int|null $count
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OrderPieces newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderPieces newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderPieces query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderPieces whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderPieces whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderPieces whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderPieces whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderPieces whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderPieces wherePieceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderPieces wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderPieces whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderPieces whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrderPieces extends Model
{
    protected $table = 'order_pieces';
    protected $guarded = [];

}

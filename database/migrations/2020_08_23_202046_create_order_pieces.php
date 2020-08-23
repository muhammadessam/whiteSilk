<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPieces extends Migration
{
    public function up()
    {
        Schema::create('order_pieces', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('piece_id');
            $table->unsignedBigInteger('order_id');

            $table->unsignedInteger('count')->nullable()->default(null);
            $table->enum('type', ['washing', 'washingAndIron', 'ironed'])->nullable()->default(null);

            $table->foreign('piece_id')->references('id')->on('price_lists')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_pieces');
    }
}

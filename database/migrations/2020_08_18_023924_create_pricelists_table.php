<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricelistsTable extends Migration
{
    public function up()
    {
        Schema::create('price_lists', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->text('item');
            $table->decimal('washing');
            $table->decimal('washingAndIron');
            $table->decimal('ironed');
            $table->text('img')->nullable()->default(null);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pricelists');
    }
}

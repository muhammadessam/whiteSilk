<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricelistsTable extends Migration
{
    public function up()
    {
        Schema::create('pricelists', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->text('item');
            $table->decimal('washing');
            $table->decimal('washingAndIron');
            $table->decimal('ironed');


            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pricelists');
    }
}

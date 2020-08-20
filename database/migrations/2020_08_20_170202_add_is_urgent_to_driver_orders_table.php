<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsUrgentToDriverOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('driver_orders', function (Blueprint $table) {
            $table->boolean('is_urgent')->nullable()->default(null);
            $table->unsignedBigInteger('driver_id')->nullable()->default(null);
        });
    }

    public function down()
    {
        Schema::table('driver_orders', function (Blueprint $table) {
            $table->dropColumn('is_urgent');
            $table->dropColumn('driver_id');
        });
    }
}

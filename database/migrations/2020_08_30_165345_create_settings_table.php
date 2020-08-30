<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('max_client_can_order_driver')->nullable()->default(null);
            $table->decimal('delivery_fees_under_price')->nullable()->default(null);
            $table->decimal('delivery_fees_under_amount')->nullable()->default(null);
            $table->date('notification_date')->nullable()->default(null);
            $table->decimal('urgent_fee')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}

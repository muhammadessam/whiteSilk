<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['دخل', 'خرج']);
            $table->text('name')->nullable()->default(null);
            $table->decimal('value');
            $table->unsignedBigInteger('order_id')->nullable()->default(null);
            $table->unsignedBigInteger('payment_method_id')->nullable()->default(null);
            $table->text('result')->nullable()->default(null);
            $table->text('postCode')->nullable()->default(null);
            $table->text('tranid')->nullable()->default(null);
            $table->text('auth')->nullable()->default(null);
            $table->text('ref')->nullable()->default(null);
            $table->text('trackid')->nullable()->default(null);
            $table->text('udf_1')->nullable()->default(null);
            $table->text('udf_2')->nullable()->default(null);
            $table->text('udf_3')->nullable()->default(null);
            $table->text('udf_4')->nullable()->default(null);
            $table->text('udf_5')->nullable()->default(null);
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
        Schema::dropIfExists('payments');
    }
}

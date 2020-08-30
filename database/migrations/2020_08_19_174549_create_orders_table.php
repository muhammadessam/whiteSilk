<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['اشتراك', 'فاتورة']);
            $table->boolean('is_fast')->default(true);
            $table->unsignedBigInteger('branch_id');
            $table->string('serial')->unique();
            $table->longText('notes')->nullable()->default(null);
            $table->unsignedBigInteger('pivot_id')->nullable()->default(null);
            $table->unsignedBigInteger('payment_method_id')->nullable()->default(null);
            $table->unsignedBigInteger('client_id')->nullable()->default(null);
            $table->unsignedBigInteger('driver_id')->nullable()->default(null);
            $table->unsignedBigInteger('address_id')->nullable()->default(null);
            $table->unsignedBigInteger('subscription_id')->nullable()->default(null);
            $table->dateTime('arrived_at')->nullable()->default(null);
            $table->dateTime('out_at')->nullable()->default(null);
            $table->unsignedBigInteger('status_id')->nullable()->default(null);
            $table->boolean('is_paid')->default(true);
            $table->unsignedBigInteger('coupon_id')->nullable()->default(null);
            $table->decimal('total')->nullable()->default(null);
            $table->decimal('discount')->nullable()->default(null);
            $table->unsignedInteger('number_of_Pieces')->nullable()->default(null);
            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
}

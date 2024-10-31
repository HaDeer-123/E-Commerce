<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->unsignedBigInteger('user_id');  // Foreign key to the users table (bigint)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->decimal('total_amount', 10, 2);  // Total order amount (decimal with precision 10, scale 2)
            
            $table->text('shipping_address');  // Shipping address (text)
            
            $table->enum('order_status', ['pending', 'shipped', 'delivered', 'canceled'])->default('pending');  // Order status (enum)
            
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');  // Payment status (enum)
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
};

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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');  // Foreign key to orders table (bigint)
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            
            $table->enum('payment_method', ['credit_card', 'paypal', 'bank_transfer', 'cash_on_delivery']);  // Enum for payment method
            $table->enum('payment_status', ['pending', 'completed', 'failed'])->default('pending');  // Enum for payment status
            
            $table->decimal('amount', 10, 2);  // Payment amount (decimal with precision 10, scale 2)
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
};

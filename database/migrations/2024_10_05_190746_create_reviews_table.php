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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');  // Foreign key to products table (bigint)
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            
            $table->unsignedBigInteger('user_id');  // Foreign key to users table (bigint)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->integer('rating');  // Integer to store product rating (from 1 to 5 typically)
            $table->text('review')->nullable();  // Review text (optional)
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
        Schema::dropIfExists('reviews');
    }
};

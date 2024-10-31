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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();  // Coupon code (varchar, unique)
            $table->decimal('discount_percentage', 5, 2);  // Discount percentage (e.g., 15.50% with precision 5, scale 2)
            
            $table->date('valid_from');  // Date when the coupon becomes valid
            $table->date('valid_to');  // Date when the coupon expires
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
        Schema::dropIfExists('coupons');
    }
};

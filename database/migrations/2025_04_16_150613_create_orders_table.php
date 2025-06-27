<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id'); // Primary key
            $table->integer('user_id'); // Foreign key to users table
            $table->date('order_date'); // Default to current timestamp
            $table->string('status'); // Status column
            $table->integer('tracking_number'); 
            $table->string('carrier', 255);
            $table->integer('coupon_id')->nullable(); 
            $table->decimal('total_price', 10, 2); 
            $table->timestamps();

      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders_detail', function (Blueprint $table) {
            $table->id('order_detail_id'); // Primary key
            $table->integer('order_id'); // Foreign key to orders table
            $table->integer('book_id'); // Foreign key to books table
            $table->integer('quantity'); // Quantity of the book
            $table->decimal('price', 15, 2); // Price of the book
            $table->timestamps();
        });
    }

   
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_detail');
    }
};

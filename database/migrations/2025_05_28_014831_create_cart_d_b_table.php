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
        Schema::create('cart_d_b', function (Blueprint $table) {
            $table->id();
            $table->integer(('user_id'));
            $table->integer('book_id');
            $table->integer('quantity')->default(0);
         $table->timestamp('created_at')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_d_b');
    }
};

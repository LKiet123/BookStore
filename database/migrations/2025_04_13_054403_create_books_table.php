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
        Schema::create('books', function (Blueprint $table) {
            $table->id('book_id'); // Primary key with auto-increment
            $table->string('title');
            $table->text('summary');
            $table->date('published_date')->nullable(); // Nullable for optional published date
            $table->integer('author_id');
            $table->integer('publisher_id');
            $table->text('description');
            $table->double('price', 15, 2); // Double with precision
            $table->string('cover_image')->nullable(); // Nullable for optional cover image
            $table->integer('volume_sold')->default(0); // Default value of 0
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

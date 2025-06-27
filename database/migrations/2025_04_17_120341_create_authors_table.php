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
        Schema::create('authors', function (Blueprint $table) {
            $table->id('author_id'); // Primary key
            $table->date('birth_date')->nullable(); // Nullable for optional birth year
            $table->string('hometown')->nullable();
            $table->string('author_name'); // Author's name
            $table->string('cover_image')->nullable(); // Nullable for optional cover image
            $table->text('bio')->nullable(); // Author's biography
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};

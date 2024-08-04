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
        Schema::create('book_genres', function (Blueprint $table) {
            
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('genre_id');

            // Define foreign key constraints with cascading deletes
            $table->foreign('book_id')
                ->references('id')
                ->on('books')
                ->onDelete('cascade')  // Cascade delete
                ->onUpdate('cascade'); // Cascade update

            $table->foreign('genre_id')
                ->references('id')
                ->on('genres')
                ->onDelete('cascade')  // Cascade delete
                ->onUpdate('cascade'); // Cascade update

            $table->primary(['book_id', 'genre_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_genres');
    }
};

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
            $table->id();
            $table->string('title')->index();
            $table->text('description');
            $table->string('photo')->nullable();
            $table->foreignId('author_id')
                ->constrained('authors')
                ->onDelete('set null')  // Set to NULL on delete
                ->onUpdate('cascade')   // Cascade on update
                ->index()
                ->name('books_author_id_foreign');
            $table->foreignId('publication_id')
                ->constrained('publications')
                ->onDelete('set null')  // Set to NULL on delete
                ->onUpdate('cascade')   // Cascade on update
                ->index()
                ->name('books_publication_id_foreign');
            $table->foreignId('category_id')
                ->constrained('categories')
                ->onDelete('set null')  // Set to NULL on delete
                ->onUpdate('cascade')   // Cascade on update
                ->index()
                ->name('books_category_id_foreign');
            $table->date('published_date')->nullable();
            $table->decimal('price', 8, 2);
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

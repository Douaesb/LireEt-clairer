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
            $table->string('category')->default('book');
            $table->string('title');
            $table->string('authors')->nullable();
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->string('average_rating')->nullable();
            $table->integer('page_count')->nullable();
            $table->string('language')->nullable();
            $table->string('pdf_url')->nullable();
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

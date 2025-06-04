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
        Schema::create('job_categories', function (Blueprint $table) {
            $table->id();

            // Parent category reference, nullable for root categories
            $table->unsignedBigInteger('category_id')->nullable();

            $table->string('title');
            $table->text('description')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();

            $table->timestamps();

            // Foreign key to same table for hierarchical categories
            $table->foreign('category_id')->references('id')->on('job_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_categories');
    }
};

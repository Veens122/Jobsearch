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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('employer_profile_id')->constrained('employer_profiles')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('job_categories')->onDelete('cascade');

            $table->string('title');
            $table->text('description');
            $table->string('country');
            $table->string('city');

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->enum('status', ['open', 'closed', 'paused'])->default('open');

            $table->string('experience_level');
            $table->string('education_level');
            $table->string('skills')->nullable();

            $table->string('company_name');
            $table->string('company_logo')->nullable();
            $table->string('company_website')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_phone')->nullable();

            $table->string('type');
            $table->decimal('salary', 10, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};

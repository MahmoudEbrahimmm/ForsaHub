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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('status', ['pending','accepted','rejected'])->default('pending');
            $table->float('ai_generated_score', 2)->default(0);
            $table->text('ai_generated_feedback')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->uuid('job_vacancy_id');
            $table->foreign('job_vacancy_id')->references('id')->on('job_vacancies')->restrictOnDelete();

            $table->uuid('resume_id');
            $table->foreign('resume_id')->references('id')->on('resumes')->restrictOnDelete();

            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};

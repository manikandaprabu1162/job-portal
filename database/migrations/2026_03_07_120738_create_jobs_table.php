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
            $table->string('job_title');
            $table->string('company_name');
            $table->integer('vacancies')->nullable();
            $table->string('location')->nullable();
            
            // Salary fields - structured for better querying
            $table->decimal('min_salary', 10, 2)->nullable(); // Minimum salary
            $table->decimal('max_salary', 10, 2)->nullable(); // Maximum salary
            $table->string('salary_currency', 10)->default('INR'); // INR, USD, etc.
            $table->boolean('is_salary_negotiable')->default(false);
            $table->string('salary_display')->nullable(); // For original display text like "₹6L - ₹9L PA"
            
            $table->string('job_type')->nullable(); // Full Time, Part Time, Contract, Internship
            $table->string('work_mode')->nullable(); // Remote, Work From Office, Hybrid
            $table->string('experience_required')->nullable(); // 0-2 years, 3-5 years
            $table->longText('job_description')->nullable();
            $table->longText('requirements')->nullable();
            $table->text('skills_required')->nullable(); // Comma separated or JSON
            $table->string('application_link')->nullable();
            $table->date('posted_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('source_platform')->default('Manual Entry');
            $table->boolean('is_active')->default(true);
            $table->timestamps(); // created_at and updated_at
            
            // Indexes for better performance
            $table->index('location');
            $table->index('job_type');
            $table->index('work_mode');
            $table->index('is_active');
            $table->index('posted_date');
            $table->index('expiry_date');
            $table->index('min_salary');
            $table->index('max_salary');
            
            // Composite index for salary filtering
            $table->index(['min_salary', 'max_salary', 'salary_currency']);
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
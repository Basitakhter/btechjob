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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('job_title');
            $table->string('job_type');
            $table->string('experience');
            $table->text('job_description');
            $table->text('requirements');
            $table->string('salary_range')->nullable();
            $table->string('location');
            $table->string('work_setup');
            $table->date('application_deadline')->nullable();
            $table->integer('vacancies');
            $table->text('benefits')->nullable();
            $table->text('instructions')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};

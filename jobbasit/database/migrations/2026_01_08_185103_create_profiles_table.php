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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->text('picture')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('phone', 20)->nullable();
            $table->string('location')->nullable();
            $table->date('dob')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other', 'Prefer not to say'])->nullable();
            $table->string('headline')->nullable();
            $table->text('about')->nullable();
            $table->string('current_position')->nullable();
            // Additional fields for your frontend
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('job_title')->nullable();
            $table->text('skills')->nullable()->comment('JSON array of skills');
            $table->string('resume_path')->nullable();
            $table->string('resume_name')->nullable();
            $table->timestamp('resume_updated_at')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unique('user_id');
        });
        
        // Work Experience table
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('company');
            $table->string('start_date');
            $table->string('end_date')->nullable();
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
        // Education table
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('degree');
            $table->string('institution');
            $table->string('start_year', 4);
            $table->string('end_year', 4)->nullable();
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
        // Certifications table
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('organization');
            $table->string('issue_date');
            $table->string('expiry_date')->nullable();
            $table->string('credential_id')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
        // Portfolio table
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->string('technologies')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('portfolios');
        Schema::dropIfExists('certifications');
        Schema::dropIfExists('education');
        Schema::dropIfExists('experiences');
        Schema::dropIfExists('profiles');
    }
};
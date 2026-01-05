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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->text('name')->nullable();
            $table->string('logo')->nullable();
            $table->text('company_tagline')->nullable();
            $table->text('description')->nullable();
            $table->text('industry')->nullable();
            $table->text('size')->nullable();
            $table->string('website')->nullable();
            $table->text('location')->nullable();
            $table->text('email')->nullable();
            $table->text('contact')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};

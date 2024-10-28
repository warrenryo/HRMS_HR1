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
        Schema::create('job_posting', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('employment_type');
            $table->string('location');
            $table->text('role_description');
            $table->text('benefits')->nullable();
            $table->string('schedule');
            $table->integer('salary_from')->nullable();
            $table->integer('salary_to')->nullable();
            $table->enum('status', ['closed', 'hiring'])->default('hiring');
            $table->boolean('isActive')->default(true);
            $table->timestamp('close_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posting');
    }
};

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
        Schema::create('employer_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_posting_id');
            $table->string('questions')->nullable();
            $table->string('checkbox_answer')->nullable();
            $table->enum('q_type',['input','checkbox', 'textarea', 'radio'])->default('input');
            $table->foreign('job_posting_id')->references('id')->on('job_posting')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employer_questions');
    }
};

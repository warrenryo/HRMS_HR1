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
        Schema::create('ai_prediction_response', function (Blueprint $table) {
            $table->id();
            $table->string('candidate_name');
            $table->string('job_title');
            $table->integer('responses_session');
            $table->integer('candidate_id');
            $table->string('candidate_resume');
            $table->TEXT('ai_response');
            $table->string('ai_ratings');
            $table->boolean('isSelected')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_prediction_response');
    }
};

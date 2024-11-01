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
        Schema::create('employer_checkbox_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_questions_id');
            $table->string('options')->nullable();
            $table->foreign('employer_questions_id')->references('id')->on('employer_questions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employer_checkbox_options');
    }
};

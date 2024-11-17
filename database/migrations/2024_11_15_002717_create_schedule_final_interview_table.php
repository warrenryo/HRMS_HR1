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
        Schema::create('schedule_final_interview', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applicant_id');
            $table->timestamp('date');
            $table->time('time');
            $table->string('via');
            $table->string('link')->nullable();
            $table->boolean('isDone')->default(false);
            $table->boolean('isForJobOffer')->default(false);
            $table->boolean('finalInterviewDone')->default(false);  
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_final_interview');
    }
};

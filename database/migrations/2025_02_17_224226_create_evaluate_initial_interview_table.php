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
        Schema::create('evaluate_initial_interview', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applicanit_d');
            $table->string('criteria');
            $table->integer('ratings');
            $table->text('comments');
            $table->foreign('applicanit_d')->references('id')->on('applicants')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluate_initial_interview');
    }
};

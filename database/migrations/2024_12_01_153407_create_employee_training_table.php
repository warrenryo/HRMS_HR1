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
        Schema::create('employee_training', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->string('training_title');
            $table->string('department');
            $table->string('location');
            $table->timestamp('startdate');
            $table->timestamp('enddate')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('status')->default(false);
            $table->foreign('employee_id')->references('id')->on('on_boarding_application_form')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_training');
    }
};

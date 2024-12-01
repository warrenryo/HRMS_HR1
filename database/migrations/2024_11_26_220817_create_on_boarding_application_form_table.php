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
        Schema::create('on_boarding_application_form', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('profile');
            $table->string('email');
            $table->string('position');
            $table->timestamp('birthdate');
            $table->enum('gender',['Male','Female']);
            $table->enum('civil_status', ['Single', 'Married']);
            $table->string('number');
            $table->text('address');
            $table->string('sss')->nullable();
            $table->string('tin')->nullable();
            $table->string('philhealth')->nullable();
            $table->string('pagibig')->nullable();
            $table->enum('status', ['ReadyForTraining', 'OnTraning', 'DoneTraining'])->default('ReadyForTraining');
            $table->boolean('approved')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('on_boarding_application_form');
    }
};

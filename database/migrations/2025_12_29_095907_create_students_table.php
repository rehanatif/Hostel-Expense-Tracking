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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('degree_program_id')->nullable();
            $table->unsignedBigInteger('referred_by')->nullable();
            $table->string('name')->nullable();
            $table->string('cnic')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_contact')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default('Pending'); // Active, Inactive, Pending
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

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
        Schema::create('facility_doctor_working_days', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('day');
            $table->foreignId('facility_doctor_id')->constrained('facility_doctors')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility_doctor_working_days');
    }
};

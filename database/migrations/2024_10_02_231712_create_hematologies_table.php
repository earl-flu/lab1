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
        Schema::create('hematologies', function (Blueprint $table) {
            $table->id();
            // Should be pulled from another database - to do
            $table->string('enccode')->nullable();
            $table->string('hpercode')->nullable();

            //patient info - should be pulled from another database - to do
            $table->datetime('date_of_report')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('age')->nullable();
            $table->string('sex');
            $table->string('cs')->nullable();
            $table->string('requesting_physician')->nullable();
            $table->string('clinical_diagnosis')->nullable();
            $table->string('ward')->nullable();
            $table->string('bed_no')->nullable();

            // hematology results
            $table->foreignId('medical_technologist_id')->constrained();
            $table->decimal('hematocrit_m', 8, 2)->nullable();
            $table->decimal('hematocrit_f', 8, 2)->nullable();
            $table->decimal('hemoglobin_m', 8, 2)->nullable();
            $table->decimal('hemoglobin_f', 8, 2)->nullable();
            $table->decimal('rbc_count', 8, 2)->nullable();
            $table->decimal('wbc_count', 8, 2)->nullable();
            $table->decimal('differential_count', 8, 2)->nullable();
            $table->decimal('neutrophils', 8, 2)->nullable();
            $table->decimal('segmenters', 8, 2)->nullable();
            $table->decimal('stabs', 8, 2)->nullable();
            $table->decimal('juveniles', 8, 2)->nullable();
            $table->decimal('myclocytes', 8, 2)->nullable();
            $table->decimal('lymphocytes', 8, 2)->nullable();
            $table->decimal('monocytes', 8, 2)->nullable();
            $table->decimal('eusinophils', 8, 2)->nullable();
            $table->decimal('basophils', 8, 2)->nullable();
            $table->decimal('esr_m', 8, 2)->nullable();
            $table->decimal('esr_f', 8, 2)->nullable();
            $table->decimal('platelet_count', 8, 2)->nullable();
            $table->string('bleeding_time')->nullable();
            $table->string('clotting_time')->nullable();
            $table->string('crt')->nullable();
            $table->decimal('mcv', 8, 2)->nullable();
            $table->decimal('mch', 8, 2)->nullable();
            $table->decimal('mchc', 8, 2)->nullable();
            $table->string('blood_type')->nullable();
            $table->string('others')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hematologies');
    }
};

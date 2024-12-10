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
        Schema::create('blood_chemistries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
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
            $table->string('requesting_physician')->nullable();
            $table->string('ward')->nullable();
            $table->foreignId('medical_technologist_id')->constrained();

            $table->decimal('fbs', 8, 2)->nullable();
            $table->decimal('sgot', 8, 2)->nullable();
            $table->decimal('sgpt', 8, 2)->nullable();
            $table->decimal('creatinine', 8, 2)->nullable();
            $table->decimal('bun_urea', 8, 2)->nullable();
            $table->decimal('uric_acid', 8, 2)->nullable();
            $table->decimal('total_bilirubin', 8, 2)->nullable();
            $table->decimal('direct_bilirubin', 8, 2)->nullable();
            $table->decimal('indirect_bilirubin', 8, 2)->nullable();
            $table->decimal('total_protein', 8, 2)->nullable();
            $table->decimal('albumin', 8, 2)->nullable();
            $table->decimal('globulin', 8, 2)->nullable();
            $table->decimal('ag_ratio', 8, 2)->nullable();
            $table->decimal('cholesterol', 8, 2)->nullable();
            $table->decimal('triglyceride', 8, 2)->nullable();
            $table->decimal('hdl_cholesterol', 8, 2)->nullable();
            $table->decimal('ldl_cholesterol', 8, 2)->nullable();
            $table->decimal('vldl_cholesterol', 8, 2)->nullable();
            $table->decimal('hba1c', 8, 2)->nullable();
            $table->decimal('sodium', 8, 2)->nullable();
            $table->decimal('potassium', 8, 2)->nullable();
            $table->decimal('chloride', 8, 2)->nullable();
            $table->decimal('ionized_calcium', 8, 2)->nullable();
            $table->decimal('nonionized_calcium', 8, 2)->nullable();
            $table->decimal('total_calcium', 8, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_chemistries');
    }
};

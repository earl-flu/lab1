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
        Schema::table('blood_chemistries', function (Blueprint $table) {
            $table->string('fbs')->nullable()->change();
            $table->string('sgot')->nullable()->change();
            $table->string('sgpt')->nullable()->change();
            $table->string('creatinine')->nullable()->change();
            $table->string('bun_urea')->nullable()->change();
            $table->string('uric_acid')->nullable()->change();
            $table->string('total_bilirubin')->nullable()->change();
            $table->string('direct_bilirubin')->nullable()->change();
            $table->string('indirect_bilirubin')->nullable()->change();
            $table->string('total_protein')->nullable()->change();
            $table->string('albumin')->nullable()->change();
            $table->string('globulin')->nullable()->change();
            $table->string('ag_ratio')->nullable()->change();
            $table->string('cholesterol')->nullable()->change();
            $table->string('triglyceride')->nullable()->change();
            $table->string('hdl_cholesterol')->nullable()->change();
            $table->string('ldl_cholesterol')->nullable()->change();
            $table->string('vldl_cholesterol')->nullable()->change();
            $table->string('hba1c')->nullable()->change();
            $table->string('sodium')->nullable()->change();
            $table->string('potassium')->nullable()->change();
            $table->string('chloride')->nullable()->change();
            $table->string('ionized_calcium')->nullable()->change();
            $table->string('nonionized_calcium')->nullable()->change();
            $table->string('total_calcium')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blood_chemistries', function (Blueprint $table) {
            $table->decimal('fbs', 8, 2)->nullable()->change();
            $table->decimal('sgot', 8, 2)->nullable()->change();
            $table->decimal('sgpt', 8, 2)->nullable()->change();
            $table->decimal('creatinine', 8, 2)->nullable()->change();
            $table->decimal('bun_urea', 8, 2)->nullable()->change();
            $table->decimal('uric_acid', 8, 2)->nullable()->change();
            $table->decimal('total_bilirubin', 8, 2)->nullable()->change();
            $table->decimal('direct_bilirubin', 8, 2)->nullable()->change();
            $table->decimal('indirect_bilirubin', 8, 2)->nullable()->change();
            $table->decimal('total_protein', 8, 2)->nullable()->change();
            $table->decimal('albumin', 8, 2)->nullable()->change();
            $table->decimal('globulin', 8, 2)->nullable()->change();
            $table->decimal('ag_ratio', 8, 2)->nullable()->change();
            $table->decimal('cholesterol', 8, 2)->nullable()->change();
            $table->decimal('triglyceride', 8, 2)->nullable()->change();
            $table->decimal('hdl_cholesterol', 8, 2)->nullable()->change();
            $table->decimal('ldl_cholesterol', 8, 2)->nullable()->change();
            $table->decimal('vldl_cholesterol', 8, 2)->nullable()->change();
            $table->decimal('hba1c', 8, 2)->nullable()->change();
            $table->decimal('sodium', 8, 2)->nullable()->change();
            $table->decimal('potassium', 8, 2)->nullable()->change();
            $table->decimal('chloride', 8, 2)->nullable()->change();
            $table->decimal('ionized_calcium', 8, 2)->nullable()->change();
            $table->decimal('nonionized_calcium', 8, 2)->nullable()->change();
            $table->decimal('total_calcium', 8, 2)->nullable()->change();
        });
    }
};

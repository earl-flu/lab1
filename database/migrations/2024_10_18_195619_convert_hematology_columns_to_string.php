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
        Schema::table('hematologies', function (Blueprint $table) {
            $table->string('hematocrit_m')->nullable()->change();
            $table->string('hematocrit_f')->nullable()->change();
            $table->string('hemoglobin_m')->nullable()->change();
            $table->string('hemoglobin_f')->nullable()->change();
            $table->string('rbc_count')->nullable()->change();
            $table->string('wbc_count')->nullable()->change();
            $table->string('differential_count')->nullable()->change();
            $table->string('neutrophils')->nullable()->change();
            $table->string('segmenters')->nullable()->change();
            $table->string('stabs')->nullable()->change();
            $table->string('juveniles')->nullable()->change();
            $table->string('myclocytes')->nullable()->change();
            $table->string('lymphocytes')->nullable()->change();
            $table->string('monocytes')->nullable()->change();
            $table->string('eusinophils')->nullable()->change();
            $table->string('basophils')->nullable()->change();
            $table->string('esr_m')->nullable()->change();
            $table->string('esr_f')->nullable()->change();
            $table->string('platelet_count')->nullable()->change();
            $table->string('bleeding_time')->nullable()->change();
            $table->string('clotting_time')->nullable()->change();
            $table->string('crt')->nullable()->change();
            $table->string('mcv')->nullable()->change();
            $table->string('mch')->nullable()->change();
            $table->string('mchc')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hematologies', function (Blueprint $table) {
            $table->decimal('hematocrit_m', 8, 2)->nullable()->change();
            $table->decimal('hematocrit_f', 8, 2)->nullable()->change();
            $table->decimal('hemoglobin_m', 8, 2)->nullable()->change();
            $table->decimal('hemoglobin_f', 8, 2)->nullable()->change();
            $table->decimal('rbc_count', 8, 2)->nullable()->change();
            $table->decimal('wbc_count', 8, 2)->nullable()->change();
            $table->decimal('differential_count', 8, 2)->nullable()->change();
            $table->decimal('neutrophils', 8, 2)->nullable()->change();
            $table->decimal('segmenters', 8, 2)->nullable()->change();
            $table->decimal('stabs', 8, 2)->nullable()->change();
            $table->decimal('juveniles', 8, 2)->nullable()->change();
            $table->decimal('myclocytes', 8, 2)->nullable()->change();
            $table->decimal('lymphocytes', 8, 2)->nullable()->change();
            $table->decimal('monocytes', 8, 2)->nullable()->change();
            $table->decimal('eusinophils', 8, 2)->nullable()->change();
            $table->decimal('basophils', 8, 2)->nullable()->change();
            $table->decimal('esr_m', 8, 2)->nullable()->change();
            $table->decimal('esr_f', 8, 2)->nullable()->change();
            $table->decimal('platelet_count', 8, 2)->nullable()->change();
            $table->string('bleeding_time')->nullable()->change();
            $table->string('clotting_time')->nullable()->change();
            $table->string('crt')->nullable()->change();
            $table->decimal('mcv', 8, 2)->nullable()->change();
            $table->decimal('mch', 8, 2)->nullable()->change();
            $table->decimal('mchc', 8, 2)->nullable()->change();
        });
    }
};

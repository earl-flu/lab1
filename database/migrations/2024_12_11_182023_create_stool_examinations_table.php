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
        Schema::create('stool_examinations', function (Blueprint $table) {
            $table->id();
            $table->datetime('date_of_report')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('age')->nullable();
            $table->string('sex');
            $table->string('requesting_physician')->nullable();
            $table->string('ward')->nullable();
            $table->foreignId('medical_technologist_id')->constrained();
            $table->timestamps();

            $table->string('color')->nullable();
            $table->string('consistency')->nullable();
            $table->string('occult_blood')->nullable();
            $table->string('red_cells')->nullable();
            $table->string('pus_cells')->nullable();
            $table->string('macrophages')->nullable();
            $table->string('trichuris_ova')->nullable();
            $table->string('ascaris_ova')->nullable();
            $table->string('hookworm')->nullable();
            $table->string('t_hominis')->nullable();
            $table->string('g_lambia_a_cyst')->nullable();
            $table->string('b_trophozoite')->nullable();
            $table->string('e_histolyca_a_cyst')->nullable();
            $table->string('bacteria')->nullable();
            $table->text('others')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stool_examinations');
    }
};

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
        Schema::create('urines', function (Blueprint $table) {
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
            $table->string('requesting_physician')->nullable();
            $table->string('ward')->nullable();
            $table->foreignId('medical_technologist_id')->constrained();

            $table->string('macro_color')->nullable();
            $table->string('macro_transparency')->nullable();
            $table->string('macro_sp_gravity')->nullable();
            $table->string('macro_reaction_ph')->nullable();
            $table->string('macro_albumin')->nullable();
            $table->string('macro_sugar')->nullable();
            $table->string('micro_epithelial_cells')->nullable();
            $table->string('micro_red_cells')->nullable();
            $table->string('micro_pus_cells')->nullable();
            $table->string('micro_bacteria')->nullable();
            $table->string('micro_casts')->nullable();
            $table->text('others')->nullable();
            $table->string('pt_result')->nullable();
            $table->string('pt_brand_name')->nullable();
            $table->string('pt_lot_no')->nullable();
            $table->date('pt_expiry_date')->nullable();
      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('urines');
    }
};

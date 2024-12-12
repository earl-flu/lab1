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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('hospital_name');
            $table->string('hospital_address')->nullable();
            $table->string('hospital_tagline')->nullable();
            $table->string('hospital_logo')->nullable();
            $table->string('hospital_email')->nullable();
            $table->string('hospital_contact_number')->nullable();
            $table->string('pathologist_name')->nullable();
            $table->string('pathologist_license_number')->nullable();
            $table->string('pathologist_esignature')->nullable();
            $table->string('esig_style')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

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
        Schema::create('resume', function (Blueprint $table) {
            $table->id();
            $table->text('file')->nullable();
            $table->text('degree_institution_name')->nullable();
            $table->text('degree_institution_location')->nullable();
            $table->text('degree_year_started')->nullable();
            $table->text('degree_year_completed')->nullable();

            $table->text('cert_institution_name')->nullable();
            $table->text('cert_institution_location')->nullable();
            $table->text('cert_year_started')->nullable();
            $table->text('cert_year_completed')->nullable();

            $table->text('high_school_name')->nullable();
            $table->text('high_school_location')->nullable();
            $table->text('high_school_year_started')->nullable();
            $table->text('high_school_year_completed')->nullable();

            $table->text('skills')->nullable();

            $table->text('userID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resume');
    }
};

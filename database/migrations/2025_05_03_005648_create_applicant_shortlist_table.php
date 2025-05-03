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
        Schema::create('applicant_shortlist', function (Blueprint $table) {
            $table->id();
            $table->text('applicant_id');
            $table->text('employer_id');
            $table->text('slug');
            $table->boolean('shortlisted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_shortlist');
    }
};

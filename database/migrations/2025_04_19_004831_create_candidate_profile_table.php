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
        Schema::create('candidate_profile', function (Blueprint $table) {
            $table->id();
            $table->text('fullname');
            $table->text('phone');
            $table->text('dob');
            $table->text('gender');
            $table->text('description');
            $table->text('facebook');
            $table->text('instagram');
            $table->text('linkedin');
            $table->text('country');
            $table->text('state');
            $table->text('present_address');
            $table->text('postal_code');
            $table->text('userID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_profile');
    }
};

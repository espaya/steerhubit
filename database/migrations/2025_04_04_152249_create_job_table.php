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
        Schema::create('my_jobs', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('description');
            $table->text('working_schedule');
            $table->text('working_day');
            $table->text('pay');
            $table->text('experience');
            $table->text('deadline');
            $table->text('qualification');
            $table->text('video')->nullable();
            $table->text('country');
            $table->text('state');
            $table->text('address');
            $table->text('postal_code');
            $table->text('status')->default('PENDING');
            $table->text('applicants')->default(0);
            $table->text('userID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job');
    }
};

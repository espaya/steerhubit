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
        Schema::table('employer_profile', function (Blueprint $table) {
            $table->unsignedBigInteger('userID')->change(); // Change the column type to unsignedBigInteger
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employer_profile', function (Blueprint $table) {
            $table->text('userID')->change(); // Rollback to the original type
        });
    }
};

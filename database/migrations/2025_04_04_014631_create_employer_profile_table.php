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
        Schema::create('employer_profile', function (Blueprint $table) {
            $table->id();
            $table->text('employer_name')->nullable();
            $table->text('employer_email')->nullable();
            $table->text('employer_phone')->nullable();
            $table->text('employer_website')->nullable();
            $table->text('employer_category')->nullable();
            $table->text('employer_public_view_profile')->nullable();

            $table->text('employer_facebook')->nullable();
            $table->text('employer_instagram')->nullable();
            $table->text('employer_linkedin')->nullable();

            $table->text('employer_country')->nullable();
            $table->text('employer_state')->nullable();
            $table->text('employer_present_address')->nullable();
            $table->text('employer_postal_code')->nullable();

            // $table->text('employer_avatar')->nullable(); // remove

            $table->text('userID');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employer_profile');
    }
};

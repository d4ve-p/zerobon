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
        Schema::create('challenge_attempts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("submission_image_path");
            $table->boolean("is_approved");

            // Foreign columns
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("challenge_id");

            // Foreign Constraint
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign('challenge_id')->references('id')->on('challenges');

            // Unique Constraint
            $table->unique(['user_id', 'challenge_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenge_attemps');
    }
};

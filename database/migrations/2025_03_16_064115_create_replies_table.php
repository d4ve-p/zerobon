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
        Schema::create('replies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('message');

            /**
             * Foreign Keys
             */
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('forum_id');

            /**
             * Foreign constraints
             */
            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('forum_id')->references('id')->on('forums');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('replies');
    }
};

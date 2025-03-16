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
            $table->unsignedBigInteger('authorId');
            $table->unsignedBigInteger('forumId');

            /**
             * Foreign constraints
             */
            $table->foreign('authorId')->references('id')->on('users');
            $table->foreign('forumId')->references('id')->on('forums');
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

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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title', 100);
            $table->string('organizer');
            $table->string('photo', 100);
            $table->string('location');
            $table->string('date');
            $table->string('time');
            $table->string('slots');
            $table->string('fee');
            $table->string('registration');
            $table->string('contact_person');
            $table->text('description');
            $table->string('barcode_photo', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};

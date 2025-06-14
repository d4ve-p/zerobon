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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('purchaseDate');
            $table->unsignedBigInteger("total");
            $table->enum("status", ["In Packing", "In Delivery", "Delivered"])->default("In Delivery");

            /**
             * Foreign keys
             */
            $table->unsignedBigInteger('user_id');

            /**
             * Foreign Constraint
             */
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};

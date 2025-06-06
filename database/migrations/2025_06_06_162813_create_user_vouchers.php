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
        Schema::create('user_vouchers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger("quantity");

            // Foreign keys
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("voucher_id");

            // Foreign Constraint
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign('voucher_id')->references('id')->on('vouchers');

            $table->unique(["user_id", "voucher_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_vouchers');
    }
};

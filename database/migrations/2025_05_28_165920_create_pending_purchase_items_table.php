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
        Schema::create('pending_purchase_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // Foreign keys
            $table->unsignedBigInteger("pending_purchase_id");
            $table->unsignedBigInteger("product_id");
            $table->unsignedBigInteger("quantity");
            $table->unsignedBigInteger("product_price");

            // Foreign key constraint
            $table->foreign("pending_purchase_id")->references("id")->on("pending_purchases");
            $table->foreign('product_id')->references('id')->on('products');

            /**
             * Unique constraint
             */
            $table->unique(['product_id', 'pending_purchase_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pending_purchase_items');
    }
};

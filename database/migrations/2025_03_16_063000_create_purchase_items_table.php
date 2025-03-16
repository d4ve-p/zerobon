<?php

use App\Models\Purchase;
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
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('quantity');
            $table->integer('productPrice');

            /**
             * Foreign key
             */
            $table->unsignedBigInteger('productId');
            $table->unsignedBigInteger('purchaseId');

            /**
             * Foreign Constraints
             */
            $table->foreign('productId')->references('id')->on('products');
            $table->foreign('purchaseId')->references('id')->on('purchases');

            /**
             * Unique constraint
             */
            $table->unique(['productId', 'purchaseId']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_items');
    }
};

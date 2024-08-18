<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id("order_id");
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger("product_id");
            $table->string("reject_message")->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('customer_id')->on('customers')->delete('cascade');
            $table->foreign('status_id')->references('status_id')->on('statuses')->delete('cascade');
            $table->foreign('product_id')->references('product_id')->on('products')->delete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
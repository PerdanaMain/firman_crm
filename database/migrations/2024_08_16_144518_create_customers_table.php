<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id("customer_id");
            $table->unsignedBigInteger('type_id');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('customer_address');
            $table->timestamps();

            $table->foreign('type_id')->references('type_id')->on('types')->delete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
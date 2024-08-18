<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id("user_id");
            $table->unsignedBigInteger('role_id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamps();

            $table->foreign('role_id')->references('role_id')->on('roles')->delete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
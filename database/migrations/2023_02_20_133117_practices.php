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
        Schema::create('practices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('bio', 2500)->nullable();
            $table->string('clinicName')->nullable();
            $table->string('email')->unique()->nullable();
            $table->bigInteger('phoneNumber')->length(11)->nullable();
            $table->string('password')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->integer('zipCode')->length(11)->nullable();
            $table->boolean('status')->nullable();
            $table->uuid('userId');
            $table->string('image')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

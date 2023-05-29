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
        Schema::create('terms', function (Blueprint $table) {
            $table->id();
            $table->integer('practice_id')->unsigned(); 
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade')->onUpdate('cascade'); 
            $table->boolean('terms_service');
            $table->boolean('privacy_Policy')->nullable();
            $table->boolean('payment_Methods')->nullable();
            $table->boolean('liability')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terms');
    }
};

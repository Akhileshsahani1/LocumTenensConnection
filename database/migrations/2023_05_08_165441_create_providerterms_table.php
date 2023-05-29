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
        Schema::create('providerterms', function (Blueprint $table) {
            $table->id();
            $table->integer('provider_id')->unsigned(); 
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade')->onUpdate('cascade'); 
            $table->boolean('terms_service')->nullable();
            $table->boolean('privacy_policy')->nullable();
            $table->boolean('payment_methods')->nullable();
            $table->boolean('liability')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providerterms');
    }
};

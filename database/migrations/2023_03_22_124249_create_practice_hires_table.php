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
        Schema::create('practice_hires', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('practice_id')->unsigned(); 
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade')->onUpdate('cascade'); 
            $table->integer('provider_id'); 
            $table->date('start_date');
            $table->date('end_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practice_hires');
    }
};

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
        Schema::create('practice_cities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('practice_state_id')->unsigned(); 
            $table->foreign('practice_state_id')->references('id')->on('practice_states'); 
            $table->string('city');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practice_cities');
    }
};

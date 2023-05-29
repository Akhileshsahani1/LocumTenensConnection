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
        Schema::create('practice_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('practice_id')->unsigned(); 
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade')->onUpdate('cascade'); 
            $table->string('practiceType');
            $table->string('positionType');
            $table->string('patientVolume');
            $table->string('treat');
            $table->string('workingHours');
            $table->string('location');
            $table->string('language')->nullable();
            $table->bigInteger('amount')->length('20')->nullable();
            $table->string('procedureType')->nullable();
            $table->string('qualities')->nullable();
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

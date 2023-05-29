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
        Schema::create('practice_rase_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('practice_id')->unsigned(); 
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade')->onUpdate('cascade'); 
            $table->string('Ticket_ID');
            $table->string('Issue');
            $table->date('Issue_Date');
            $table->string('message',1000);
            $table->string('screenShort', 500)->nullable();
            $table->boolean('practice_raise_tickets_status')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practice_rase_tickets');
    }
};

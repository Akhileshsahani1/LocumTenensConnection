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
        Schema::create('raiseTicket', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ticketId');
            $table->integer('provider_id')->unsigned(); 
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade')->onUpdate('cascade');
            $table->string('ticketTitle')->nullable();
            $table->string('ticketDescription', 1000)->nullable();
            $table->json('attachFile', 1000)->nullable();
            $table->boolean('ticketStatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raiseTicket');
    }
};

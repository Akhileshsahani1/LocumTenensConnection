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
        Schema::create('admin_provider_ticket_resolveds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('provider_id')->unsigned(); 
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade')->onUpdate('cascade'); 
            $table->string('ticket_id')->nullable();
            $table->string('issue')->nullable();
            $table->string('admin_message',1000)->nullable();
            $table->string('screenshort')->nullable();
            $table->boolean('provider_resolved_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_provider_ticket_resolveds');
    }
};

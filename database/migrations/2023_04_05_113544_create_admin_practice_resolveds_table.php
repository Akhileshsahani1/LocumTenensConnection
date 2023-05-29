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
        Schema::create('admin_practice_resolveds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('practice_id')->unsigned(); 
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade')->onUpdate('cascade'); 
            $table->string('ticket_id')->nullable();
            $table->string('issue')->nullable();
            $table->date('issue_date')->nullable();
            $table->string('admin_message',1000)->nullable();
            $table->string('screenshort')->nullable();
            $table->boolean('practice_resolved_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_practice_resolveds');
    }
};

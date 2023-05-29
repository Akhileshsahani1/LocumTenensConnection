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
        Schema::create('provider_avialabilities', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->date('event_start');
            $table->date('event_end');
            $table->string('bookingid')->nullable;
            $table->string('color');
            $table->string('status');
            $table->string('userid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provider_avialabilities');
    }
};

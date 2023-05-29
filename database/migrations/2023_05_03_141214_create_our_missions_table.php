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
        Schema::create('our_missions', function (Blueprint $table) {
            $table->id();
            $table->string('our_mission_contents', 500);
            $table->string('dentalpractice_para_first');
            $table->string('dentalpractice_search');
            $table->string('dentalpractice_schedule');
            $table->string('dentalpractice_book');
            $table->string('dentalpractice_review');

            $table->string('dentalprofessional_para_first');
            $table->string('dentalprofessional_profile');
            $table->string('dentalprofessional_schedule');
            $table->string('dentalprofessional_accept');
            $table->string('dentalprofessional_getpaid');
            $table->string('dentalprofessional_review');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_missions');
    }
};

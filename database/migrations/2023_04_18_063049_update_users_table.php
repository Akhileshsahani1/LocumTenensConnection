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
        Schema::table('users', function (Blueprint $table) {
            $table->string('token')->nullable();
            $table->integer('connection_id')->nullable();
            $table->enum('user_status', ['Offline', 'Online'])->nullable();
            $table->string('user_image')->nullable();
            $table->string('Type_user')->nullable();
            $table->uuid('userId');
            
            
      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('token');
            $table->dropColumn('connection_id');
            $table->dropColumn('user_status');
            $table->dropColumn('user_image');
            $table->dropColumn('Type_user');
        });
    }
};

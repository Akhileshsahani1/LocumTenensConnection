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
        Schema::create('providers', function (Blueprint $table) {
            //step 1
            $table->increments('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->string('token')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone');
            $table->integer('city');
            $table->integer('state');
            $table->integer('zipcode');
            //step 2s
            $table->string('practitioner_Type')->nullable();
            $table->string('position_Type')->nullable();
            $table->date('start_Date')->nullable();
            $table->date('end_Date')->nullable();
            $table->string('primary_Handedness')->nullable();
            $table->string('distance_Willing_To_Travel_One_Way')->nullable();
             $table->string('peferred_Daily_Working_Hours')->nullable();
            //step 3
            $table->string('preferred_Daily_Patient_Volume')->nullable();
            $table->string('are_You_Willing_Overnight')->nullable();
            $table->string('professional_Experience')->nullable();
            $table->string('booking_Availability_Requirements')->nullable();

            $table->string('dailyneeds_LatexAllergy')->nullable();
            $table->string('dailyneeds_GloveSize')->nullable();
            $table->string('dailyneeds_SpecialNeeds')->nullable();
            $table->string('preferred_Region')->nullable();

            //step 4
            $table->string('available_Days')->nullable();
            $table->string('procedure_Type')->nullable();
            $table->string('advanced_Degree_Licences')->nullable();
            $table->string('comfortable_Treating_Children')->nullable();
            $table->string('qualities_Practice_Environment')->nullable();
            $table->integer('average_Daily_Rate')->nullable();
            $table->integer('average_hour_rate')->nullable();
            //step 5
            $table->string('upload_Photo')->nullable();
            $table->string('Virginia_Dental_File')->nullable();
            $table->string('malpractices_Certificate')->nullable();
            $table->string('dea_License')->nullable();
            $table->string('description', 2500)->nullable();
            $table->string('subscription')->nullable();
            $table->boolean('status')->nullable();
            $table->uuid('userId');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};

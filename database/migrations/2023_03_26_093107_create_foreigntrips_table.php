<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foreigntrips', function (Blueprint $table) {
            $table->increments('id')->unsignedInteger;
            $table->unsignedInteger('emp_id')->nullable();
            $table->foreign('emp_id')->references('id')->on('employees');

            $table->unsignedInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->string('program_name');
            $table->unsignedInteger('inviter_id');
            $table->foreign('inviter_id')->references('id')->on('inviters');

            $table->date('date_of_program');
            $table->string('eventPlace');
            $table->unsignedInteger('doner_id');
            $table->date('commitee_date');

            $table->foreign('doner_id')->references('id')->on('doners');

            $table->unsignedInteger('participation_id');
            $table->foreign('participation_id')->references('id')->on('participations');

            $table->date('pre_trip_date');
            $table->string('pre_trip_subject');
            $table->string('ministry_approval');
            $table->string('agree_mof');
            $table->string('order_of_authority');
            $table->string('participant_grantee');
            $table->string('participation');

            $table->date('report_date');
            $table->string('report_image')->nullable();
            $table->string('considerations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreigntrips');
    }
};

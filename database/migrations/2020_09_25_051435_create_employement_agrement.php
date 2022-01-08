<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployementAgrement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employement_agrement', function (Blueprint $table) {
            $table->id();
            $table->integer('application_id');
            $table->string('monthly_salary');
            $table->string('food_acco');
            $table->string('air_passage');
            $table->string('duty_hour');
            $table->string('holiday');
            $table->string('leave');
            $table->string('overtime_benifit');
            $table->string('medical_fecilities');
            $table->string('period_contact');
            $table->string('repatriation_arrang');
            $table->string('other_team_condition');
            $table->timestamps();
            $table->index('application_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employement_agrement');
    }
}

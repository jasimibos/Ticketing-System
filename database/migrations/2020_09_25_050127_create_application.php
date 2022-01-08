<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->string('sl_no');
            $table->string('business_address');
            $table->string('name');
            $table->string('sex');
            $table->string('religion');
            $table->integer('marital_status')->comment('1=married, 2=unmarried');
            $table->string('mother_name');
            $table->text('home_address');
            $table->date('dob');
            $table->string('passport_issued_date');
            $table->string('pob');
            $table->string('mofa_no');
            $table->string('visa_no');
            $table->string('visa_issue_date');
            $table->string('sponsor_name');
            $table->string('profesion_arabic');
            $table->string('profession');
            $table->timestamps();
            $table->index('client_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application');
    }
}

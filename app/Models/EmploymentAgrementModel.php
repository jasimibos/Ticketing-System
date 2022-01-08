<?php

namespace App\EmploymentAgrementModel;

use Illuminate\Database\Eloquent\Model;

class EmploymentAgrementModel extends Model
{
    protected $table = 'employement_agrement';
    protected $primaryKey = 'id';
    protected $fillable = ['application_id','monthly_salary','food_acco','air_passage','duty_hour','holiday','leave','overtime_benifit','medical_fecilities','period_contact','repatriation_arrang','other_team_condition'];


    public function validation() {
    	return [
    		'monthly_salary' => 'required',
    		'food_acco' => 'required',
    		'air_passage' => 'required',
    		'duty_hour' => 'required',
    		'holiday' => 'required',
    		'leave' => 'required',
    		'overtime_benifit' => 'required',
    		'medical_fecilities' => 'required',
    		'period_contact' => 'required',
    		'repatriation_arrang' => 'required',
    		'other_team_condition' => 'required',
    	];
    }
}

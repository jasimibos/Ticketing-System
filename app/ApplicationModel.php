<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationModel extends Model
{
    protected $table = 'application';
    protected $primaryKey = 'id';
    protected $fillable = ['client_id','sl_no','business_address','name','sex','religion','marital_status','mother_name','home_address','dob','passport_issued_date','passport_expiry_date','passport_no','pob','mofa_no','visa_no','visa_issue_date','sponsor_name','profesion_arabic','profession'];



    public function validation($id = 0) {
    	return [
    		'client_id' => 'required',
    		//'sl_no' => 'required',
    		'business_address' => 'required',
    		'name' => 'required',
    		'sex' => 'required',
    		'religion' => 'required',
    		'marital_status' => 'required',
    		//'mother_name' => 'required',
    		'home_address' => 'required',
    		'dob' => 'required',
    		'passport_issued_date' => 'required',
    		'passport_expiry_date' => 'required',
    		'pob' => 'required',
    		'passport_no' => 'required',
    		'mofa_no' => 'required',
    		'visa_no' => 'required',
    		'visa_issue_date' => 'required',
    		'sponsor_name' => 'required',
    		'profesion_arabic' => 'required',
    		'profession' => 'required'
    	];
    }

    public function applicationLicense() {
        return $this->hasOne('App\Models\ClientLicenseModel','id','business_address');
    }
}

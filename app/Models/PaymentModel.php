<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
    protected $table = 'payment';
	protected $primaryKey = 'id';
    protected $fillable = ['client_id','month','year','status'];

    public function validation() {
    	return [
    		'client_id' => 'required',
    		'month' => 'required',
    		'year' => 'required',
    	];
    }
}

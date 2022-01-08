<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientLicenseModel extends Model
{
	protected $table = 'client_license';
	protected $primaryKey = 'id';
    protected $fillable = ['client_id','name','address'];
}

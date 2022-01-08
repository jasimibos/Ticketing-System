<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoticeModel extends Model
{
    protected $table = 'notice';
	protected $primaryKey = 'id';
    protected $fillable = ['title','description','status'];

    public function validation() {
    	return [
    		'title' => 'required',
    		'description' => 'required',
    	];
    }
}

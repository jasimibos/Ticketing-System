<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\ClientLicenseModel;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','owner_name', 'phone', 'address','reg_no', 'role', 'amount_per_month', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function client_validation($id = 0){
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id.',id',
            'password' => $id == 0 ? 'required|confirmed|min:8' : 'sometimes',
            'owner_name' => 'required',
            'phone' => 'required',
            'amount_per_month' => $id == 0 ? 'required' : 'sometimes',
            'address' => 'required',
        ];
    }

    public function admin_validation($id = 0){
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id.',id',
            'password' => $id == 0 ? 'required|confirmed|min:8' : 'sometimes',
            'phone' => 'required',
            'address' => 'required'
        ];
    }

    public function change_password() {
        return [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ];
    }

    public function license() {
        return $this->hasMany(ClientLicenseModel::class, 'client_id','id');
    }
}

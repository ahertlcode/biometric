<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    /**
     * Mass assignable attributes.
     *
     * @var array
     */
    protected $fillable = ['user_name','user_type_id','email','phone','password'];

    /**
     *
     * Hidden columns not to be returned in query result.
     *
     */
    protected $hidden = ['id','created_at','updated_at','status'];

    public function generateToken()
    {
        $this->api_token = str_random(60);
        $this->save();
        return $this->api_token;
    }
    public function rememberToken()
    {
        $rmtoken = "";
        for($i=0; $i<6; $i++){
            $rmtoken .= rand(1,9);
        }
        $this->remember_token = $rmtoken;
        $this->save();
        return $this->remember_token;
    }
    /**
     * Get the user_type for this model.
     *
     * @return App\UserType
     */
    public function user_type()
    {
        return $this->belongsTo('App\UserType', 'user_type_id')->get();
    }


}
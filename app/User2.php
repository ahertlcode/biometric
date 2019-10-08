<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'mobile_phone', 'password',
        'location_id', 'sub_region_id', 'region_id',
        'state_id', 'country_id','password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'password_reset_token', 
        'created_at', 'updated_at', 'location_id', 'sub_region_id', 
        'region_id', 'state_id', 'country_id', 'status', 
        'email_validated_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_validated_at' => 'datetime',
    ];

    public function generateToken()
    {
        $this->api_token = str_random(60);
        $this->save();

        return $this->api_token;
    }

    public function rememberToken(){
        $rmtoken = "";

        for($i=0; $i<6; $i++){
            $rmtoken .= rand(1,9);
        }

        $this->remember_token = $rmtoken;
        $this->save();

        return $this->remember_token;
    }

    public function location(){
        return $this->belongsTo('App\Location', 'location_id')->get();
    }

    public function sub_region(){
        return $this->belongsTo('App\SubRegion', 'sub_region_id')->get();
    }

    public function region(){
        return $this->belongsTo('App\Region', 'region_id')->get();
    }

    public function state(){
        return $this->belongsTo('App\State', 'state_id')->get();
    }

    public function country(){
        return $this->belongsTo('App\Country', 'country_id')->get();
    }

    public function access(){
        return \App\Access::where('role_id', 
            $this->role_id)->get()
            ->toArray();
    }

    public function asset(){
        $assets = array();
        $asset_list = \App\Asset::all();
        //return $asset_list;
        foreach($asset_list as $asset){
            array_push($assets, $asset['name']."_create");
            array_push($assets, $asset['name']."_view");
            array_push($assets, $asset['name']."_update");
            array_push($assets, $asset['name']."_delete");
        }
        return $assets;
    }
}

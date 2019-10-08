<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    /**
     *
     * Mass assignable columns
     *
     */
    protected $fillable = ['user_type'];

    /**
     *
     * Hidden columns not to be returned in query result.
     *
     */
    protected $hidden = ['id','created_at','updated_at','status'];

    /**
     * Get the user_type_id give the names
     * @param string user_type $user_type
     * @return App\UserType
     */
    public static function getId($user_type){
        return self::where('user_type', $user_type)->first()->id;
    }
}
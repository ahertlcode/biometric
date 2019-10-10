<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     *
     * Mass assignable columns
     *
     */
    protected $fillable = ['user_id','matric_number','first_name','middle_name','last_name','level_id','department_id'];

    /**
     *
     * Hidden columns not to be returned in query result.
     *
     */
    protected $hidden = ['id','created_at','updated_at','status'];

    /**
     * Get the user for this model.
     *
     * @return App\User
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id')->get();
    }

    /**
     * Get the level for this model.
     *
     * @return App\Level
     */
    public function level()
    {
        return $this->belongsTo('App\Level', 'level_id')->get();
    }

    /**
     * Get the department for this model.
     *
     * @return App\Department
     */
    public function department()
    {
        return $this->belongsTo('App\Department', 'department_id')->get();
    }


}
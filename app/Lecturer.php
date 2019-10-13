<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    /**
     * Mass assignable attributes.
     *
     * @var array
     */
    protected $fillable = ['user_id','staff_number','name','department_id'];

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
     * Get the department for this model.
     *
     * @return App\Department
     */
    public function department()
    {
        return $this->belongsTo('App\Department', 'department_id')->get();
    }


}
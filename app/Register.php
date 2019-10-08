<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    /**
     *
     * Mass assignable columns
     *
     */
    protected $fillable = ['user_id','course_id'];

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
     * Get the course for this model.
     *
     * @return App\Course
     */
    public function course()
    {
        return $this->belongsTo('App\Course', 'course_id')->get();
    }


}
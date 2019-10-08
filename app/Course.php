<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     *
     * Mass assignable columns
     *
     */
    protected $fillable = ['course_code','course_title'];

    /**
     *
     * Hidden columns not to be returned in query result.
     *
     */
    protected $hidden = ['id','created_at','updated_at','status'];


}
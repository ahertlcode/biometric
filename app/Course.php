<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * Mass assignable attributes.
     *
     * @var array
     */
    protected $fillable = ['course','course_title'];

    /**
     *
     * Hidden columns not to be returned in query result.
     *
     */
    protected $hidden = ['created_at','updated_at','status'];

    /**
     * Get the id of a course given the course code
     *
     * @param string course_code
     *
     * @return string id
     */
    public function getCourseId(String $course_code){
        return \App\Course::where('course_code', $course_code)->first()->id;
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     *
     * Mass assignable columns
     *
     */
    protected $fillable = ['department_name','faculty_id'];

    /**
     *
     * Hidden columns not to be returned in query result.
     *
     */
    protected $hidden = ['id','created_at','updated_at','status'];

    /**
     * Get the faculty for this model.
     *
     * @return App\Faculty
     */
    public function faculty()
    {
        return $this->belongsTo('App\Faculty', 'faculty_id')->get();
    }


}
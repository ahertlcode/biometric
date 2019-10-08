<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    /**
     *
     * Mass assignable columns
     *
     */
    protected $fillable = ['faculty_name'];

    /**
     *
     * Hidden columns not to be returned in query result.
     *
     */
    protected $hidden = ['id','created_at','updated_at','status'];


}
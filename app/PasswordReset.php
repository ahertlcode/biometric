<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    /**
     *
     * Mass assignable columns
     *
     */
    protected $fillable = ['email','token'];

    /**
     *
     * Hidden columns not to be returned in query result.
     *
     */
    protected $hidden = ['id','created_at','updated_at','status'];


}
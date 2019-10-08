<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    /**
     *
     * Mass assignable columns
     *
     */
    protected $fillable = ['user_id','name','designation','section_id'];

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
     * Get the section for this model.
     *
     * @return App\Section
     */
    public function section()
    {
        return $this->belongsTo('App\Section', 'section_id')->get();
    }


}
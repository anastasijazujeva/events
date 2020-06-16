<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsToMany('App\User', 'event_user', 'event_id', 'user_id');
    }

    public function organizator()
    {
        return $this->belongsTo('App\Organizator');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }

    public function category()
    {
        return $this->hasMany('App\Category');
    }
}

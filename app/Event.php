<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsToMany('App\User');
    }

    public function organizator()
    {
        return $this->belongsTo('App\Organizator');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }
}

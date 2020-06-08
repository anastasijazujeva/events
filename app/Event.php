<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function user()
    {
        return $this->belongsToMany('App\Users');
    }

    public function organizator()
    {
        return $this->belongsTo('App\Organizator', 'organizator_id_FK');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment', 'comment_FK');
    }
}

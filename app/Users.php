<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public function organizator()
    {
        return $this->hasOne('App\Organizator', 'organizator_FK');
    }

    public function events()
    {
        return $this->belongsToMany('App\Event', 'event_user', 'user_id', 'event_id');
    }
}

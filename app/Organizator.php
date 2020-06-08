<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizator extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Users', 'user_FK');
    }

    public function events()
    {
        return $this->hasMany('App\Event', 'event_id_FK');
    }
}

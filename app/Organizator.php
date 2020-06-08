<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizator extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function events()
    {
        return $this->hasMany('App\Event');
    }
}

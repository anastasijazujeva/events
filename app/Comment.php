<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function events()
    {
        return $this->belongsTo('App\Event', 'event_FK');
    }
}

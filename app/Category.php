<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}

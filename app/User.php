<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return ($this->role == 'admin');
    }

    public function isOrganizer()
    {
        return ($this->role == 'organizer');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function organizator()
    {
        return $this->hasOne('App\Organizator');
    }

    public function events()
    {
        return $this->belongsToMany('App\Event', 'event_user', 'user_id', 'event_id');
    }
    public function comments() {
        return $this->hasMany('App\Comment');
    }
}

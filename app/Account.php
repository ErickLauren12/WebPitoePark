<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    protected $fillable = [
        'username', 'phone', 'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function event(){
        return $this->hasMany(Event::class);
    }

    public function cafe(){
        return $this->hasMany(Cafe::class);
    }
}

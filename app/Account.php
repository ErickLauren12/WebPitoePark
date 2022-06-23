<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = [
        'username', 'phone', 'password', 'name', 'address'
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

    public function log_news(){
        return $this->hasMany(LogNews::class);
    }

    public function log_galery(){
        return $this->hasMany(LogGalerie::class);
    }

    public function log_facility(){
        return $this->hasMany(LogFacility::class);
    }

    public function log_cafe(){
        return $this->hasMany(LogCafe::class);
    }
}

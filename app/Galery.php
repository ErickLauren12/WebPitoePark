<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Galery extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'image','account_id','format'
    ];

    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function log_galery(){
        return $this->hasMany(LogGalerie::class);
    }
}

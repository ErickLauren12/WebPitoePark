<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facility extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title', 'body', 'account_id', 'image'
    ];

    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function log_facility(){
        return $this->hasMany(LogFacility::class);
    }
}

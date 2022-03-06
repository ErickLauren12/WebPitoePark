<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = [
        'title', 'body', 'account_id', 'image'
    ];

    public function account(){
        return $this->belongsTo(Account::class);
    }
}

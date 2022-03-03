<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryFood extends Model
{
    protected $fillable = [
        'name'
    ];

    public function cafe(){
        return $this->hasMany(Cafe::class);
    }
}

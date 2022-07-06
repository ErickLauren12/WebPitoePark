<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryReservation extends Model
{
    protected $fillable = [
        'name'
    ];

    public function reservation(){
        return $this->hasMany(Reservation::class);
    }
}

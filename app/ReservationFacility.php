<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationFacility extends Model
{
    protected $fillable = [
        'name'
    ];

    public function reservation(){
        return $this->hasMany(Reservation::class);
    }
}

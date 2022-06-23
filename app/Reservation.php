<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'name', 'email','phone','description','start_date', 'end_date','facility_id'
    ];

    public function scopeFilter($query, array $filter){
        $query->when($filter['name']??false, function($query, $name){
            return $query->where('name', 'like', '%'.$name."%");
        });

        $query->when($filter['startDate']??false, function($query, $startDate){
            return $query->where('start_date', 'like', '%'.$startDate."%");
        });

        $query->when($filter['endDate']??false, function($query, $endDate){
            return $query->where('end_date', 'like', '%'.$endDate."%");
        });

        $query->when($filter['facility_id']??false, function($query, $facility_id){
            return $query->where('facility_id', 'like', '%'.$facility_id."%");
        });
    }

    public function facility(){
        return $this->belongsTo(ReservationFacility::class);
    }
}

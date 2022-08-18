<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CafeDetail extends Model
{
    public function cafe() {
        return $this->belongsTo('App\Cafe');
    }
}

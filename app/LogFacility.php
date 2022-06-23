<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogFacility extends Model
{
    public function account(){
        return $this->belongsTo("App\Account","id_account")->withTrashed();
    }

    public function facility(){
        return $this->belongsTo("App\Facility","id_facility")->withTrashed();
    }
}

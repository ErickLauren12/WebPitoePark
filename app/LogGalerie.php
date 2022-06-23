<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogGalerie extends Model
{
    public function account(){
        return $this->belongsTo("App\Account","id_account")->withTrashed();
    }

    public function galery(){
        return $this->belongsTo("App\Galery","id_galery")->withTrashed();
    }
}

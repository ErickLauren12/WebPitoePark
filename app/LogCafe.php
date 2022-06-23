<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogCafe extends Model
{
    public function account(){
        return $this->belongsTo("App\Account","id_account")->withTrashed();
    }

    public function cafe(){
        return $this->belongsTo("App\Cafe","id_cafe")->withTrashed();
    }
}

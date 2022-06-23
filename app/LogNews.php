<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogNews extends Model
{
    public function account(){
        return $this->belongsTo("App\Account","id_account")->withTrashed();
    }

    public function news(){
        return $this->belongsTo("App\News","id_news")->withTrashed();
    }
}

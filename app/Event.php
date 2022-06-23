<?php

namespace App;

use App\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'body', 'account_id'
    ];

    public function account(){
        return $this->belongsTo("App\Account","account_id");
    }
}

<?php

namespace App;

use App\Account;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{    
    protected $fillable = [
        'title', 'body', 'account_id'
    ];

    public function account(){
        return $this->belongsTo(Account::class);
    }
}

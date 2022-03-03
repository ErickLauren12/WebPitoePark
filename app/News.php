<?php

namespace App;
use App\Account;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title', 'body', 'account_id', 'image'
    ];

    public function account(){
        return $this->belongsTo(Account::class);
    }
}

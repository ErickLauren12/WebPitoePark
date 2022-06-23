<?php

namespace App;
use App\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'body', 'account_id', 'image', 'excerpt'
    ];

    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function log_news(){
        return $this->hasMany(LogNews::class);
    }
}

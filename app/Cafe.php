<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    protected $fillable = [
        'name', 'image', 'price', 'account_id', 'category_id'
    ];

    public function account(){
        return $this->belongsTo(Account::class);
    }
    public function category(){
        return $this->belongsTo(CategoryFood::class);
    }
}

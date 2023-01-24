<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cafe extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'image', 'price', 'account_id', 'category_id', 'action',
    ];

    public function scopeFilter($query, array $filter){
        $query->when($filter['search']??false, function($query, $search){
            return $query->where('name', 'like', '%'.$search."%");
        });

        $query->when($filter['category_id']??false, function($query, $category){
            return $query->where('category_id', 'like', '%'.$category."%");
        });
    }

    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function category(){
        return $this->belongsTo(CategoryFood::class);
    }

    public function log_cafe(){
        return $this->hasMany(LogCafe::class);
    }


}

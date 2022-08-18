<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = "orders";
    protected $fillable = [
        'id', 'keterangan', 'status_order', 'meja_id', 'cafes_id', 'total_price', 'jumlah'
    ];

    public function detail() {
        return $this->hasMany('App\CafeDetail', 'order_id', 'id');
    }

    public function meja() {
        return $this->belongsTo('App\Meja');
    }
}

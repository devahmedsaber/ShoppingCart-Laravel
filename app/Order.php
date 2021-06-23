<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'user_id', 'cart'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}

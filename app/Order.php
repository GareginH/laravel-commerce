<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name', 'price', 'quantity',
    ];
    public function profile(){
        return $this->belongsTo(Profile::class);
    }
}

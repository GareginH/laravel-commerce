<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['bonus',];
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}

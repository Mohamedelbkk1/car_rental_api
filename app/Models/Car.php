<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable=['brand', 'model', 'price_per_day', 'image', 'available'];
    public function reservation(){
        return $this->hasMany(Reservation::class) ;
    }
}

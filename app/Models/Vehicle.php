<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;



    public function bookings()
    {
        return $this->hasMany(booking::class);
    }

    public function type()
    {
        return $this->belongsTo(type::class);
    }
    protected $guarded = [];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    public function bookings()
    {
        return $this->hasMany(booking::class);
    }
    protected $guarded = [];
}

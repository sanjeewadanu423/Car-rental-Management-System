<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function bookings()
    {
        return $this->hasMany(booking::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }
    protected $guarded = [];
}

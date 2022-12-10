<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    protected $guarded = [];


}

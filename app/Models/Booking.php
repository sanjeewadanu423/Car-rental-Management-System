<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function vehicle()
    {
        return $this->belongsTo(vehicle::class);
    }

    public function customer()
    {
        return $this->belongsTo(customer::class);
    }

    public function review()
    {
        return $this->belongsTo(review::class);
    }

    public function offer()
    {
        return $this->belongsTo(offer::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function booking()
    {
        return $this->hasOne(booking::class);
    }

    public function email()
    {
        return $this->belongTo(email::class);
    }
}

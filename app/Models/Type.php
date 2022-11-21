<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $table = 'vehicle_types';

    public function vehicles()
    {
        return $this->hasMany(vehicle::class);
    }

    public function cat()
    {
        return $this->belongsTo(cat::class,'vehicle_cat_id');
    }

    protected $guarded = [];
}

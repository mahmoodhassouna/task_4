<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    public function farmer(){
        return $this->hasOne(Farmer::class);
    }

    public function governorate(){
        return $this->belongsTo(Governorate::class);
    }
}

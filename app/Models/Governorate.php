<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    use HasFactory;

    public function farmer(){
        return $this->hasOne(Farmer::class);
    }

    public function region(){
        return $this->hasMany(Region::class);
    }

}

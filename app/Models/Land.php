<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function farmer(){
        return $this->belongsTo(Farmer::class);
    }

    public function governorate(){
        return $this->belongsTo(Governorate::class);
    }
    public function region(){
        return $this->belongsTo(Region::class);
    }
}

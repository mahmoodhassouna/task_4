<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Farmer extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $guarded = [];

    public function lands(){
        return $this->hasMany(Land::class);
    }

    public function governorate(){
        return $this->belongsTo(Governorate::class);
    }
    public function region(){
        return $this->belongsTo(Region::class);
    }

}

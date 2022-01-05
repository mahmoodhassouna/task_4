<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class GovernoratesController extends Controller
{
    public function region($governorate_id){
        $regions = Region::where('governorate_id',$governorate_id)->get();
        return response()->json([
            'data'=>$regions
        ]);
    }
}

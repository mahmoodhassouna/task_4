<?php

namespace App\Http\Controllers;

use App\Models\CustomLog;
use Illuminate\Http\Request;

class NotifyController extends Controller
{
    public function index(){
       return view('notify.notify');
    }
    public function notify(){
        $notify = CustomLog::all();

        return response()->json([
            'notify'=>$notify
        ]);
    }
}

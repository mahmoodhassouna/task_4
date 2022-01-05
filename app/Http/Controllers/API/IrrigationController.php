<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Irrigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IrrigationController extends Controller
{
    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'land_id'=>'required|numeric|exists:lands,id',
                'capacity' => 'nullable|numeric',
                'type' => 'required',
                'height' => 'nullable|numeric',
                'depthWellMeter' => 'nullable|numeric',
                'depth' => 'nullable|numeric',
                'energy' => 'nullable|numeric',
                'electricity' => 'nullable|numeric',
                'wellNumber' => 'nullable|numeric',

            ] ,[]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages()
                ]);
            } else {


                Irrigation::insert([
                    'capacity' => $request->post('capacity'),
                    'type' => $request->post('type'),
                    'height' => $request->post('height'),
                    'depthWellMeter' => $request->post('depthWellMeter'),
                    'depth' => $request->post('depth'),
                    'land_id' => $request->post('land_id'),
                    'energy' => $request->post('energy'),
                    'electricity' => $request->post('electricity'),
                    'wellNumber' => $request->post('wellNumber'),
                    'pondType' => $request->post('pondType'),
                ]);



                return response()->json([
                    'status' => 400,
                    'msg' => "تم الحفظ بنجاح",
                ]);



            }
        }catch (\Exception $ex){
            return $ex;
            return response()->json([
                'status' => 401,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
            ]);
        }
    }

    public function destroy($id)
    {
        $irrigattion = Irrigation::find($id);

        if(!$irrigattion){
            return response()->json([
                'status'=>'200'
            ]);
        }else{
            $irrigattion->delete();
            return response()->json([
                'status'=>'400'
            ]);

        }
    }
}

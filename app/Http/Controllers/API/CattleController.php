<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cattle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CattleController extends Controller
{
    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'land_id'=> 'required|numeric|exists:lands,id',
                'type' => 'required',
                'area' => 'required',
                'farmerType' => 'required',
                'roof' =>'required',
                'number' => 'required',

            ] ,[
                    'land_id.required'=>'يجب اضافة ارض لمواصلة الاضافة'

                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages()
                ]);
            } else {


                Cattle::insert([
                    'type' => $request->post('type'),
                    'area' => $request->post('area'),
                    'farmerType' => $request->post('farmerType'),
                    'roof' => $request->post('roof'),
                    'number' => $request->post('number'),
                    'land_id' => $request->post('land_id'),

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
        $v = Cattle::find($id);

        if(!$v){
            return response()->json([
                'status'=>'200'
            ]);
        }else{
            $v->delete();
            return response()->json([
                'status'=>'400'
            ]);

        }
    }
}

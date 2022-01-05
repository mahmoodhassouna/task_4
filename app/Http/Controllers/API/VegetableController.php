<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Vegetable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VegetableController extends Controller
{
    public function store(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), [
                'land_id'=> 'required|numeric|exists:lands,id',
                'item' => 'required',
                'area' => 'required',
                'date' => 'required',

            ] ,[
                    'land_id.required'=>'يجب اضافة مزارع لمواصلة الاضافة'

                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages()
                ]);
            } else {


                Vegetable::insert([
                    'item' => $request->post('item'),
                    'date' => $request->post('date'),
                    'area' => $request->post('area'),
                    'protection' => $request->post('protection'),
                    'protectionType' => $request->post('protectionType'),
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
        $v = Vegetable::find($id);

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

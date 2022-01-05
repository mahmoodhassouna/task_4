<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Trees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TreesController extends Controller
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


                Trees::insert([
                    'item' => $request->post('item'),
                    'date' => $request->post('date'),
                    'area' => $request->post('area'),
                    'protection' => $request->post('protection'),
                    'treeNumber' => $request->post('treeNumber'),
                    'irrigationMethod' => $request->post('irrigationMethod'),
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
        $v = Trees::find($id);

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

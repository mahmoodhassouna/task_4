<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Application extends Controller
{
    public function store(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), [
                'farmer_id'=> 'required|numeric|exists:farmers,id',



            ] ,[
                    'farmer_id.required'=>'يجب اضافة مزارع لمواصلة الاضافة'

                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages()
                ]);
            } else {


                \App\Models\Application::updateOrCreate([
                    'q1' => $request->post('q1'),
                    'q2' => $request->post('q2'),
                    'q3' => $request->post('q3'),
                    'q4' => $request->post('q4'),
                    'q5' => $request->post('q5'),
                    'q6' => $request->post('q6'),
                    'q7' => $request->post('q7'),
                    'q8' => $request->post('q8'),
                    'q9' => $request->post('q9'),
                    'q10' => $request->post('q10'),
                    'q11' => $request->post('q11'),
                    'q12' => $request->post('q11'),
                    'productionCapacity' => $request->post('productionCapacity'),
                    'farmer_id' => $request->post('farmer_id'),

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
}

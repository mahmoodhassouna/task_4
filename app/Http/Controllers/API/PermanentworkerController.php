<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Permanentworker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermanentworkerController extends Controller
{
    public function store(Request $request)
    {
        // return $request;

        try {

            $validator = Validator::make($request->all(), [
                'farmer_id'=> 'required|numeric|exists:farmers,id',
                'idNumber'=> 'required|numeric|digits:9|unique:permanentworkers,idNumber',
                'name' => 'required|string',
                'gender' => 'required|string',
                'phone' => 'required|string',
                'address' => 'required|string',


            ] ,[
                    'farmer_id.required'=>'يجب اضافة مزارع لمواصلة الاضافة'
                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'errors' => $validator->messages()
                ]);
            } else {

                if(isset($request->familyMembers)  && $request->familyMembers == 'true'){
                    $familyMembers = 1;
                }else{
                    $familyMembers = 0;
                }
                Permanentworker::insert([
                    'idNumber' => $request->post('idNumber'),
                    'name' => $request->post('name'),
                    'gender' => $request->post('gender'),
                    'phone' => $request->post('phone'),
                    'address' => $request->post('address'),
                    'familyMembers' => $familyMembers,
                    'farmer_id' => $request->post('farmer_id'),

                ]);


                return response()->json([
                    'status' => 200,
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
        $a1 = Permanentworker::find($id);

        if (!$a1){

            return response()->json([
                'status'=>200,
                'msg'=>'success deleted'
            ]);

        }else{

            $a1->delete();
            return response()->json([
                'status'=>200,
                'msg'=>'success deleted'
            ]);
        }

    }

}

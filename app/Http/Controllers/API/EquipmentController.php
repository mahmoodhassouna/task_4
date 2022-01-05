<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EquipmentController extends Controller
{
    public function createEquipment(Request $request){
        try {

            $validator = Validator::make($request->all(), [
                'machine'=> 'string|max:20',
                'propertyType'=> 'string|max:20',
                'number'=> 'numeric',
                'notes'=> 'string|max:150',
                'farmer_id'=> 'required|numeric|exists:farmers,id',
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



                Equipment::insert([
                    'farmer_id' => $request->post('farmer_id'),
                    'machine' => $request->post('machine'),
                    'propertyType' => $request->post('propertyType'),
                    'number' => $request->post('number'),
                    'notes' => $request->post('notes'),
                ]);


                return response()->json([
                    'status' => 200,
                    'msg' => "تمت اضافة المعدات بنجاح",
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

    public function delete($id){
        $equipment = Equipment::find($id);

        if(!$equipment){
            return response()->json([
                'status'=> 400,
                'msg'=>'المعدات غير موجودة'
            ]);
        }else{

            $equipment->delete();
            return response()->json([
                'status'=> 200,
                'msg'=>'تم العملية بنجاح'
            ]);
        }
    }
}

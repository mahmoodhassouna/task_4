<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Farmer;
use App\Models\ShowEquipment;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EquipmentController extends Controller
{
    public function equipments(){
        $farmer = Farmer::latest()->select('id')->first();
        $equipments = Equipment::where('farmer_id', $farmer->id)->get();
        return response()->json([
            'equipments'=>$equipments
        ]);
    }

    public function check($farmer_id, $propertyType, $machine){
        $eq = Equipment::where('farmer_id',$farmer_id)->get();
        foreach ($eq as $item){
            if ($item->machine === $machine && $item->propertyType === $propertyType){
                return false;
            }

        }
        return true;
    }


    public function createEquipment(Request $request){
        try {

            $validator = Validator::make($request->all(), [
                'machine'=> 'string|max:20',
                'propertyType'=> 'string|max:20',
                'number'=> 'numeric|digits_between:0,6',
                'notes'=> 'nullable|string|max:100',
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



             if($this->check($request->post('farmer_id'), $request->post('propertyType'), $request->post('machine'))){

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
             else{
                 return response()->json([
                     'status' => 402,
                     'msg' => "البيانات مكررة حاول مجددا",
                 ]);
             }


            }
        }catch (\Exception $ex){
           // return $ex;
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

    public function edit($farmer_id){
       $equipments = Equipment::where('farmer_id',$farmer_id)->get();

       if(!$equipments){
           return response()->json([
               'status'=>400,
           ]);
       }else {
           return response()->json([
               'status'=>200,
               'equipments'=>$equipments,
           ]);
       }
    }

     public function editSingle($farmer_id){
       $equipments = Equipment::find($farmer_id);

       if(!$equipments){
           return response()->json([
               'status'=>400,
           ]);
       }else {
           return response()->json([
               'status'=>200,
               'equipments'=>$equipments,
           ]);
       }
    }


}

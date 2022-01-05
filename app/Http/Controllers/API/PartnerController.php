<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
{
    public function store(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), [
                'idNumber'=> 'required|numeric|digits:9|unique:partners,idNumber',
                'partnershipRatio'=> 'required',
                'name'=> 'string|required|max:30',
                'partnerType'=> 'required',
                'land_id'=>'required|numeric|exists:lands,id'

            ] ,[]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages()
                ]);
            } else {


                Partner::insert([
                    'partnershipRatio' => $request->post('partnershipRatio'),
                    'partnerType' => $request->post('partnerType'),
                    'idNumber' => $request->post('idNumber'),
                    'name' => $request->post('name'),
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
        //return $id;
        $partner2 = Partner::find($id);

        if(!$partner2){
            return response()->json([
                'status'=> 400,
                'msg'=>' غير موجودة'
            ]);
        }else{
            $partner2->delete();
            return response()->json([
                'status'=> 200,
                'msg'=>'تم العملية بنجاح'
            ]);
        }
    }
}

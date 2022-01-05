<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Crop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CropController extends Controller
{

    public function store(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), [
                'land_id'=>'required|numeric|exists:lands,id',
                'item' => 'required',
                'agricultureHistory' => 'required',
                'cultivatedArea' => 'required',
                'crop' => 'required',
                'irrigationMethod' => 'required',
                'depression' => 'nullable',
                'causeDepression' => 'nullable',
                'endDate' => 'nullable',

            ] ,[]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages()
                ]);
            } else {
                if(isset($request->depression)){
                    if($request->depression = 'true'){
                        $depression = 1;
                    }
                } else{
                    $depression = 0;
                }

                Crop::insert([
                    'item' => $request->post('item'),
                    'agricultureHistory' => $request->post('agricultureHistory'),
                    'cultivatedArea' => $request->post('cultivatedArea'),
                    'crop' => $request->post('crop'),
                    'land_id' => $request->post('land_id'),
                    'irrigationMethod' => $request->post('irrigationMethod'),
                    'depression' => $depression,
                    'causeDepression' => $request->post('causeDepression'),
                    'endDate' => $request->post('endDate'),
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
        $crop = Crop::find($id);

        if(!$crop){
            return response()->json([
                'status'=>'200'
            ]);
        }else{
            $crop->delete();
            return response()->json([
                'status'=>'400'
            ]);

        }
    }

}

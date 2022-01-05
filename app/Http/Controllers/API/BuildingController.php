<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BuildingController extends Controller
{
    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'type'=> 'required',
                'ownerBuild'=> 'required',
                'note'=> 'required',
                'area'=> 'required',
                'land_id'=>'required|numeric|exists:lands,id'

            ] ,[]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages()
                ]);
            } else {


                Building::insert([
                    'type' => $request->post('type'),
                    'ownerBuild' => $request->post('ownerBuild'),
                    'note' => $request->post('note'),
                    'area' => $request->post('area'),
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
        $build = Building::find($id);

        if(!$build){
            return response()->json([
                'status'=>'200'
            ]);
        }else{
            $build->delete();
            return response()->json([
                'status'=>'400'
            ]);

        }
    }

    public function buildings(){
        $buildings = Building::where('certified',0)->get();
        return response()->json([
            'buildings'=>$buildings
        ]);
    }

    public function addBuilding(){
        $other = Building::where('certified',0);
        $other->update([
            'certified'=> 1
        ]);
        return response()->json([
            'status'=>'200',
            'msg'=>'تم الاعتماد بنجاح'
        ]);
    }
}

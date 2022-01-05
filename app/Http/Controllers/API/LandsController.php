<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Farmer;
use App\Models\Land;
use App\Models\Other;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LandsController extends Controller
{
    public function landsFarmer(){
        $farmerId = Farmer::latest()->select('id')->first();
        if($farmerId){
            $land = Land::where('farmer_id',$farmerId->id)->get();
            return response()->json([
                'land'=>$land
            ]);
        }else{
            return response()->json([
                'land'=>'not found any farmer'
            ]);
        }

    }

    public function lands($farmer_id){
        // return 9;
        $land = Land::where('farmer_id',$farmer_id)->get();
        return response()->json([
            'land'=>$land
        ]);
    }

    public function destroy($id)
    {
        $a1 = Land::find($id);

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

    public function latestLand(){
        $land = Land::latest()->select('id')->first();
        return response()->json([
            'land'=>$land
        ]);
    }

    public function store(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), [
                'idNumber'=> 'required|numeric|digits:9|unique:lands,idNumber',
                'idNumber2'=> 'required|numeric|digits:9|unique:lands,idNumber2',
                'farmer_id'=> 'required|numeric|exists:farmers,id',
                'pieceNumber'=> 'required|numeric',
                'voucherNumber'=> 'required|numeric',
                'areaBuildingTenurePurposes'=> 'required|numeric',
                'areaBuildingNonTenurePurposes'=> 'required|numeric',
                'permanentFallowArea'=> 'required|numeric',
                'temporaryFallowSpace'=> 'required|numeric',
                'cultivatedLandArea'=> 'required|numeric',
                'areaForestTrees'=> 'required|numeric',
                'totalLandArea'=> 'required|numeric',
                'farFromArmisticeLine'=> 'required',
                'typeOfContract'=> 'required',
                'region_id'=> 'required',
                'ownerType'=> 'required',
                'owner'=> 'required',
                'fName'=> 'string|required',
                'gName'=> 'string',
                'mName'=> 'string|required',
                'lName'=> 'string|required',
                'guide'=> 'required',
                'notes'=> 'required',
                'governorate_id'=> 'required',
            ] ,[
                    'farmer_id.required'=>'يجب اضافة مزارع لمواصلة الاضافة',
                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages()
                ]);
            } else {


                Land::insert([
                    'pieceNumber' => $request->post('pieceNumber'),
                    'voucherNumber' => $request->post('voucherNumber'),
                    'idNumber' => $request->post('idNumber'),
                    'idNumber2' => $request->post('idNumber2'),
                    'fName' => $request->post('fName'),
                    'lName' => $request->post('lName'),
                    'mName' => $request->post('mName'),
                    'gName' => $request->post('gName'),
                    'areaBuildingTenurePurposes' => $request->post('areaBuildingTenurePurposes'),
                    'areaBuildingNonTenurePurposes' => $request->post('areaBuildingNonTenurePurposes'),
                    'permanentFallowArea' => $request->post('permanentFallowArea'),
                    'temporaryFallowSpace' => $request->post('temporaryFallowSpace'),
                    'cultivatedLandArea' => $request->post('cultivatedLandArea'),
                    'areaForestTrees' => $request->post('areaForestTrees'),
                    'totalLandArea' => $request->post('totalLandArea'),
                    'farFromArmisticeLine' => $request->post('farFromArmisticeLine'),
                    'typeOfContract' => $request->post('typeOfContract'),
                    'region_id' => $request->post('region_id'),
                    'ownerType' => $request->post('ownerType'),
                    'owner' => $request->post('owner'),
                    'institutionNumber' => $request->post('institutionNumber'),
                    'idInstitutionNumber' => $request->post('idInstitutionNumber'),
                    'guide' => $request->post('guide'),
                    'notes' => $request->post('notes'),
                    'governorate_id' => $request->post('governorate_id'),
                    'farmer_id' => $request->post('farmer_id'),

                ]);
                $other = Other::where('certified',0);
                $other->delete();

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

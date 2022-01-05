<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Cattle;
use App\Models\Crop;
use App\Models\CustomLog;
use App\Models\Farmer;
use App\Models\Governorate;
use App\Models\Irrigation;
use App\Models\Land;
use App\Models\Other;
use App\Models\Partner;
use App\Models\Poultry;
use App\Models\Region;
use App\Models\Trees;
use App\Models\Vegetable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LandController extends Controller
{

    protected $customLog;
    public function __construct(CustomLog $customLog)
    {
        $this->customLog = $customLog;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::all();
        $governorate = Governorate::all();
        return view('land.addLand',[
            'regions'=>$regions,
            'governorate'=>$governorate
        ]);
    }

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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), [
                'idNumber'=> 'required|numeric|digits:9|unique:lands,idNumber',


                'institutionNumber'=> 'nullable|numeric|digits:5|unique:lands,institutionNumber',
                //'idNumber2'=> 'nullable|numeric|digits:9|unique:lands,idNumber2',
                'governorate_id'=> 'required|numeric|exists:governorates,id',
                'region_id'=> 'required|numeric|exists:regions,id',
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

                'idInstitutionNumber'=> 'nullable|numeric|digits:9|unique:lands,idNumber',


            ] ,[
                    'farmer_id.required'=>'يجب اضافة مزارع لمواصلة الاضافة',
                    'idNumber.unique'=>'رقم الهوية مكرر',
                    'idNumber2.unique'=>'رقم هوية المالك مكرر',
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
                  //  'idNumber2' => $request->post('idNumber2'),
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
                $this->customLog->create([
                    'content'=>'تم اضافة ارض جديدة على النظام ',
                    'operation'=>'اضافة',
                    'user'=>Auth::user()->name,
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Land  $land
     * @return \Illuminate\Http\Response
     */
    public function show($land_id)
    {
        $regions = Region::all();
        $governorate = Governorate::all();

        $land = Land::find($land_id);
        if(!$land){

            return response()->json([
                'msg'=>400,
            ]);

        }else{

            return view('land.editLand',[
                'land'=>$land,
                'regions'=>$regions,
                'governorate'=>$governorate
            ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Land  $land
     * @return \Illuminate\Http\Response
     */
    public function edit(Land $land)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Land  $land
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $land = Land::find($id);

        try {

            $validator = Validator::make($request->all(), [
                'idNumber'=> 'required|numeric|digits:9|exists:lands,idNumber',
                'idInstitutionNumber'=> 'nullable|numeric|digits:9|exists:lands,idInstitutionNumber',
                'institutionNumber'=> 'nullable|numeric|digits:5|exists:lands,institutionNumber',
               // 'idNumber2'=> 'nullable|numeric|digits:9|exists:lands,idNumber2',
              //  'farmer_id'=> 'required|numeric|exists:farmers,id',
                'governorate_id'=> 'required|numeric|exists:governorates,id',
                'region_id'=> 'required|numeric|exists:regions,id',
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

            ] ,[
                    'farmer_id.required'=>'يجب اضافة مزارع لمواصلة الاضافة',
                    'idNumber.exists'=>'رقم الهوية غير موجود من قبل',
                    'idNumber2.exists'=>'رقم هوية المالك غير موجود من قبل ',
                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages()
                ]);
            } else {


                $land->update([
                    'pieceNumber' => $request->post('pieceNumber'),
                    'voucherNumber' => $request->post('voucherNumber'),
                    'idNumber' => $request->post('idNumber'),
                    //'idNumber2' => $request->post('idNumber2'),
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
                   // 'farmer_id' => $request->post('farmer_id'),

                ]);
                $this->customLog->create([
                    'content'=>'تم تحديث ارض  على النظام ',
                    'operation'=>'تحديث',
                    'user'=>Auth::user()->name,
                ]);



                return response()->json([
                    'status' => 400,
                    'msg' => "تم التحديث بنجاح",
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Land  $land
     * @return \Illuminate\Http\Response
     */
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

    public function newLandFarmer($farmer_id){
        $governorate = Governorate::all();
        return view('land.addLandFarmer',[
            'farmer_id'=>$farmer_id,
            'governorate'=>$governorate,
        ]);
    }
}

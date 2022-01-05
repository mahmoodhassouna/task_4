<?php

namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\CustomLog;
use App\Models\Permanentworker;
use App\Models\Temporaryworker;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Equipment;
use App\Models\Farmer;
use App\Models\Governorate;
use App\Models\Land;
use App\Models\Region;
use App\Models\ShowEquipment;
use App\Models\Test;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\This;
use function Symfony\Component\String\s;
use Illuminate\Support\Facades\Auth;

class FarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $customLog;
    public function __construct(CustomLog $customLog)
    {
      $this->customLog = $customLog;
    }

    public function index()
    {
      $regions = Region::all();
      $governorate = Governorate::all();
      return view('farmer.addFarmer',[
          'regions'=>$regions,
          'governorate'=>$governorate
      ]);
    }

    public function archiveFarmers(){
        return view('farmer.achiveFarmer');
    }

    public function showFarmers(){
        return view('farmer.showFarmers');
    }


    public function farmers(){
        $farmers = Farmer::all();
        return response()->json([
            'status'=>200,
            'farmers'=>$farmers
        ]);
    }


    public  function search(){

        $governorate = Governorate::all();
        $region = Region::all();

     return view('search.search',[
         'governorate'=>$governorate,
         'regions'=>$region,
     ]);

    }


    public  function searchAbout(Request $request){
        //return $request;
          $array1 = [];
          $array2 = [];
        if(isset($request->idNumber)){
            $array1 += ['idNumber'=>$request->idNumber];
        }
        if(isset($request->cardNumber)){
            $array1 += ['cardNumber'=>$request->cardNumber];
        }
        if(isset($request->date)){
            $array1 += ['entryDate'=>$request->date];
        }
        if(isset($request->fName)){
            $array1 += ['fName'=>$request->fName];
        }
        if(isset($request->governorate_id)){
            $array1 += ['governorate_id'=>$request->governorate_id];
        }
        if(isset($request->region_id)){
            $array1 += ['region_id'=>$request->region_id];
        }
        if(isset($request->voucherNumber)){
            $array2 += ['voucherNumber'=>$request->voucherNumber];
        }
        if(isset($request->pieceNumber)){
            $array2 += ['pieceNumber'=>$request->pieceNumber];
        }
        if(isset($request->farFromArmisticeLine)){
            $array2 += ['farFromArmisticeLine'=>$request->farFromArmisticeLine];
        }

        $farmer = Farmer::where($array1)->with(['region','governorate'])->whereHas('lands',function(Builder $q) use ($array2) {
            $q->where($array2);
        })->get();

        return response()->json([
            'data'=>$farmer,
            'status'=>400
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
                'idNumber'=> 'required|numeric|digits:9|unique:farmers,idNumber',
                'governorate_id'=> 'required|numeric|exists:governorates,id',
                'region_id'=> 'required|numeric|exists:regions,id',
                'cardNumber'=> 'required|numeric',
                'fName'=> 'string|required|max:30',
                'gName'=> 'string|max:30',
                'mName'=> 'string|max:30',
                'lName'=> 'string|max:30',
                'birthDate'=> 'required|max:40',
                'phone'=> 'max:20',
            ] ,[]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages()
                ]);
            } else {


                    Farmer::insert([
                        'cardNumber' => $request->post('cardNumber'),
                        'entryDate' => $request->post('entryDate'),
                        'idNumber' => $request->post('idNumber'),
                        'birthDate' => $request->post('birthDate'),
                        'fName' => $request->post('fName'),
                        'lName' => $request->post('lName'),
                        'mName' => $request->post('mName'),
                        'gName' => $request->post('gName'),
                        'phone' => $request->post('phone'),
                        'email' => $request->post('email'),
                        'governorate_id' => $request->post('governorate_id'),
                        'region_id' => $request->post('region_id'),
                        'guide' => $request->post('guide'),
                        'socialState' => $request->post('socialState'),
                        'gender' => $request->post('gender'),
                        'qualifications' => $request->post('qualifications'),

                    ]);
             //   Log::info("this is info message");
                   $this->customLog->create([
                       'content'=>'تم اضافة مزارع جديد على النظام يحمل هوية رقم'. $request->post('idNumber'),
                       'operation'=>'اضافة',
                       'user'=>Auth::user()->name,
                   ]);


                    return response()->json([
                        'status' => 400,
                        'msg' => "تمت اضافة مزارع بنجاح ",
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


    public function latestFarmer(){
        $farmer = Farmer::latest()->select('id')->first();
        return response()->json([
            'farmer'=>$farmer
        ]);
    }


    public function show(Farmer $farmer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $farmer = Farmer::find($id);
        $governorate = Governorate::all();
        $region = Region::all();


        if(!$farmer){
            return response()->json([
                'status'=>400
            ]);
        }else{
            return view('farmer.editFarmer',[
                'farmer'=>$farmer,
                'governorate'=>$governorate,
                'regions'=>$region,
            ]);
            return response()->json([
                'status'=>200,

            ]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try {
            $farmer = Farmer::find($id);
            if(!$farmer){

                return response()->json([
                    'status' => 400,
                    'msg' => "غير موجود",
                ]);

            }else{
                $validator = Validator::make($request->all(), [
                    'idNumber'=> 'required|numeric|digits:9|exists:farmers,idNumber',
                    'governorate_id'=> 'required|numeric|exists:governorates,id',
                    'region_id'=> 'required|numeric|exists:regions,id',
                    'cardNumber'=> 'required|numeric',
                    'fName'=> 'string|required|max:30',
                    'gName'=> 'string|max:30',
                    'mName'=> 'string|max:30',
                    'lName'=> 'string|max:30',
                    'birthDate'=> 'required|max:40',
                    'phone'=> 'max:20',
                ] ,[]
                );

                if ($validator->fails()) {
                    return response()->json([
                        'status' => 400,
                        'errors' => $validator->messages()
                    ]);
                } else {


                    $farmer->update([
                        'cardNumber' => $request->post('cardNumber'),
                        'entryDate' => $request->post('entryDate'),
                        'idNumber' => $request->post('idNumber'),
                        'birthDate' => $request->post('birthDate'),
                        'fName' => $request->post('fName'),
                        'lName' => $request->post('lName'),
                        'mName' => $request->post('mName'),
                        'gName' => $request->post('gName'),
                        'phone' => $request->post('phone'),
                        'email' => $request->post('email'),
                        'governorate_id' => $request->post('governorate_id'),
                        'region_id' => $request->post('region_id'),
                        'guide' => $request->post('guide'),
                        'socialState' => $request->post('socialState'),
                        'gender' => $request->post('gender'),
                        'qualifications' => $request->post('qualifications'),

                    ]);

                    $this->customLog->create([
                        'content'=>'تم التعديل على بيانات المزارع يحمل هوية رقم'. $request->post('idNumber'),
                        'operation'=>'تحديث',
                        'user'=>Auth::user()->name,
                    ]);

                    return response()->json([
                        'status' => 200,
                        'msg' => "تم التحديث بنجاح",
                    ]);



                }
            }

        }catch (\Exception $ex){
            return $ex;
            return response()->json([
                'status' => 401,
                'msg' => 'فشل التحديث برجاء المحاوله مجددا',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $farmer = Farmer::find($id);

        if(!$farmer){
            return response()->json([
                'status'=>400,
                'msg'=>'المزارع غير موجود حاول مجددا',
            ]);

        }else{

            $this->customLog->create([
                'content'=>'تم حذف بطاقة المزارع رقم' . $farmer->cardNumber ,
                'operation'=>'حذف',
                'user'=>Auth::user()->name,
            ]);

            $farmer->forceDelete();
            return response()->json([
                'status'=>200,
                'msg'=>'تمت حذف  بطاقة المزارع',
            ]);



        }
    }

    public function archFarmer($id){

        $farmer = Farmer::find($id);

        if(!$farmer){
            return response()->json([
                'status'=>400,
                'msg'=>'المزارع غير موجود حاول مجددا',
            ]);
        }else{

            $this->customLog->create([
                'content'=>'تم ارشفة بطاقة المزارع رقم' . $farmer->cardNumber ,
                'operation'=>'ارشفة',
                'user'=>Auth::user()->name,
            ]);

            $farmer->delete();
            return response()->json([
                'status'=>200,
                'msg'=>'تمت ارشفة بطاقة المزارع',
            ]);
        }
    }

    public function archiveFarmersTable(){
        $farmers = Farmer::onlyTrashed()->get();
        return response()->json([
            'status'=>200,
            'farmers'=>$farmers
        ]);
    }

    public function unarchFarmer($id){
        $farmer = Farmer::withTrashed()->find($id);

        if(!$farmer){
            return response()->json([
                'status'=>400,
                'msg'=>'المزارع غير موجود حاول مجددا',
            ]);
        }else{
            $farmer->restore();
            return response()->json([
                'status'=>200,
                'msg'=>'تمت الغاء ارشفة بطاقة المزارع',
            ]);
        }
    }

    public function deleteArchiveFarmer($id){
        $farmer = Farmer::withTrashed()->find($id);

        if(!$farmer){
            return response()->json([
                'status'=>400,
                'msg'=>'المزارع غير موجود حاول مجددا',
            ]);
        }else{
            $this->customLog->create([
                'content'=>'تم حذف بطاقة المزارع المؤرشفة رقم' . $farmer->cardNumber ,
                'operation'=>'حذف مؤرشف',
                'user'=>Auth::user()->name,
            ]);
            $farmer->forceDelete();
            return response()->json([
                'status'=>200,
                'msg'=>'تم حذف المزارع بشكل نهائي',
            ]);
        }
    }

}

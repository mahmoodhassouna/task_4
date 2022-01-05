<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CustomLog;
use App\Models\Farmer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FarmerController extends Controller
{

    protected $customLog;
    public function __construct(CustomLog $customLog)
    {
        $this->customLog = $customLog;
    }
    public function farmers(){
        $farmers = Farmer::all();
        return response()->json([
            'status'=>200,
            'farmers'=>$farmers
        ]);
    }

    public function store(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), [
                'idNumber'=> 'required|numeric|digits:9|unique:farmers,idNumber',
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

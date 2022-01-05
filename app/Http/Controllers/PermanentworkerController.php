<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Models\Permanentworker;
use App\Models\ShowPworker;
use App\Models\Temporaryworker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermanentworkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function pworkers(){
        $farmer = Farmer::latest()->select('id')->first();
        $pworkers = Permanentworker::where('farmer_id',$farmer->id)->get();
        return response()->json([
            'pworkers'=>$pworkers
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
       // return $request;

        try {

            $validator = Validator::make($request->all(), [
                'farmer_id'=> 'required|numeric|exists:farmers,id',
                'idNumber'=> 'required|numeric|digits:9|unique:permanentworkers,idNumber',
                'name' => 'required|string',
                'gender' => 'required|string',
                'phone' => 'required|digits_between:7,10',
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permanentworker  $permanentworker
     * @return \Illuminate\Http\Response
     */
    public function show(Permanentworker $permanentworker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permanentworker  $permanentworker
     * @return \Illuminate\Http\Response
     */
    public function edit($farmer_id)
    {
        $pWorker = Permanentworker::where('farmer_id',$farmer_id)->get();
        if(!$pWorker){
            return response()->json([
                'status'=>400
            ]);
        }else{
            return response()->json([
                'status'=>200,
                'pWorker'=>$pWorker
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permanentworker  $permanentworker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permanentworker $permanentworker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permanentworker  $permanentworker
     * @return \Illuminate\Http\Response
     */
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

<?php

namespace App\Http\Controllers;

use App\Models\Temporaryworker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TemporaryworkerController extends Controller
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
                'numberMales'=> 'required|numeric',
                'numberMalesFamily'=> 'required|numeric',
                'numberFmales'=> 'required|numeric',
                'numberFmalesFamily'=> 'required|numeric',
                'farmer_id'=> 'required|numeric|exists:farmers,id',



            ] ,[
                    'farmer_id.required'=>'يجب اضافة مزارع لمواصلة الاضافة'

                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages()
                ]);
            } else {


                Temporaryworker::insert([
                    'numberMales' => $request->post('numberMales'),
                    'numberMalesFamily' => $request->post('numberMalesFamily'),
                    'numberFmales' => $request->post('numberFmales'),
                    'numberFmalesFamily' => $request->post('numberFmalesFamily'),
                    'farmer_id' => $request->post('farmer_id'),

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
     * @param  \App\Models\Temporaryworker  $temporaryworker
     * @return \Illuminate\Http\Response
     */
    public function show(Temporaryworker $temporaryworker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Temporaryworker  $temporaryworker
     * @return \Illuminate\Http\Response
     */
    public function edit($farmer_id)
    {
      $tWorker = Temporaryworker::where('farmer_id',$farmer_id)->get();
        if(!$tWorker){
            return response()->json([
                'status'=>400
            ]);
        }else{
            return response()->json([
                'status'=>200,
                'tworkk'=>$tWorker
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Temporaryworker  $temporaryworker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Temporaryworker $temporaryworker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Temporaryworker  $temporaryworker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Temporaryworker $temporaryworker)
    {
        //
    }
}

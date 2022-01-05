<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
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


                Application::updateOrCreate([
                    'q1' => $request->post('q1'),
                    'q2' => $request->post('q2'),
                    'q3' => $request->post('q3'),
                    'q4' => $request->post('q4'),
                    'q5' => $request->post('q5'),
                    'q6' => $request->post('q6'),
                    'q7' => $request->post('q7'),
                    'q8' => $request->post('q8'),
                    'q9' => $request->post('q9'),
                    'q10' => $request->post('q10'),
                    'q11' => $request->post('q11'),
                    'q12' => $request->post('q11'),
                    'productionCapacity' => $request->post('productionCapacity'),
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
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit($farmer_id)
    {
        $app = Application::where('farmer_id',$farmer_id)->get();

        if(!$app){
            return response()->json([
                'status'=>400,
            ]);
        }else {
            return response()->json([
                'status'=>200,
                'app'=>$app,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try {
          $app = Application::where('farmer_id',$id)->first();
          if(!$app){

              return response()->json([
                  'status' => 401,
                  'msg' => "لا يوجد تطبيقات خاصة بهذا المزارع ",
              ]);

          }else{
              $validator = Validator::make($request->all(), [
                  'farmer_id'=> 'required|numeric|exists:farmers,id',



              ] ,[
                      'farmer_id.required'=>'غير قادر للوصول لبيانات المزارع'
                  ]
              );

              if ($validator->fails()) {

                  return response()->json([
                      'status' => 400,
                      'errors' => $validator->messages()
                  ]);

              } else {


                  $app->update([
                      'q1' => $request->post('q1'),
                      'q2' => $request->post('q2'),
                      'q3' => $request->post('q3'),
                      'q4' => $request->post('q4'),
                      'q5' => $request->post('q5'),
                      'q6' => $request->post('q6'),
                      'q7' => $request->post('q7'),
                      'q8' => $request->post('q8'),
                      'q9' => $request->post('q9'),
                      'q10' => $request->post('q10'),
                      'q11' => $request->post('q11'),
                      'q12' => $request->post('q11'),
                      'productionCapacity' => $request->post('productionCapacity'),
                      'farmer_id' => $request->post('farmer_id')

                  ]);


                  return response()->json([
                      'status' => 200,
                      'msg' => "تم تحديث البيانات ",
                  ]);



              }
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
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }
}

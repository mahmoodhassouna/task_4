<?php

namespace App\Http\Controllers;

use App\Models\Land;
use App\Models\Other;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class OtherController extends Controller
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

    public function other(){
        $land = Land::latest()->select('id')->first();

        $other = Other::where('land_id',$land->id)->get();
         return response()->json([
             'other'=>$other
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
                'land_id'=> 'required|numeric|exists:lands,id',
                'type' => 'required',
                'area' => 'required|numeric',
                'farmerType' =>'required',
                'notes' => 'required|max:200',
                'number' => 'required',



            ] ,[
                    'land_id.required'=>'يجب اضافة ارض لمواصلة الاضافة'

                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages()
                ]);
            } else {


                Other::insert([
                    'type' => $request->post('type'),
                    'area' => $request->post('area'),
                    'farmerType' => $request->post('farmerType'),
                    'notes' => $request->post('notes'),
                    'number' => $request->post('number'),
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Other  $other
     * @return \Illuminate\Http\Response
     */
    public function show(Other $other)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Other  $other
     * @return \Illuminate\Http\Response
     */
    public function edit($land_id)
    {
        $item= Other::where('land_id',$land_id)->get();
        if (!$item){

            return response()->json([
                'status'=>400
            ]);

        }else{

            return response()->json([
                'status'=>200,
                'other'=>$item
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Other  $other
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Other $other)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Other  $other
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $v = Other::find($id);

        if(!$v){
            return response()->json([
                'status'=>'200'
            ]);
        }else{
            $v->delete();
            return response()->json([
                'status'=>'400'
            ]);

        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Irrigation;
use App\Models\Land;
use App\Models\Showirrigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IrrigationController extends Controller
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
                'land_id'=>'required|numeric|exists:lands,id',
                   'capacity' => 'nullable|numeric',
                    'type' => 'required',
                    'height' => 'nullable|numeric',
                    'depthWellMeter' => 'nullable|numeric',
                    'depth' => 'nullable|numeric',
                    'energy' => 'nullable|numeric',
                    'electricity' => 'nullable|numeric',
                    'wellNumber' => 'nullable|numeric',

            ] ,[]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages()
                ]);
            } else {


                Irrigation::insert([
                    'capacity' => $request->post('capacity'),
                    'type' => $request->post('type'),
                    'height' => $request->post('height'),
                    'depthWellMeter' => $request->post('depthWellMeter'),
                    'depth' => $request->post('depth'),
                    'land_id' => $request->post('land_id'),
                    'energy' => $request->post('energy'),
                    'electricity' => $request->post('electricity'),
                    'wellNumber' => $request->post('wellNumber'),
                    'pondType' => $request->post('pondType'),
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


    public function irrigation(){
        $land = Land::latest()->select('id')->first();
        $irrigation = Irrigation::where('land_id',$land->id)->get();
        return response()->json([
            'irrigation'=>$irrigation
        ]);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Irrigation  $irrigation
     * @return \Illuminate\Http\Response
     */
    public function show(Irrigation $irrigation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Irrigation  $irrigation
     * @return \Illuminate\Http\Response
     */

    public function edit($land_id)
    {
        $irrigation= Irrigation::where('land_id',$land_id)->get();
        if (!$irrigation){

            return response()->json([
                'status'=>400
            ]);

        }else{

            return response()->json([
                'status'=>200,
                'irrigation'=>$irrigation
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Irrigation  $irrigation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Irrigation $irrigation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Irrigation  $irrigation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $irrigattion = Irrigation::find($id);

        if(!$irrigattion){
            return response()->json([
                'status'=>'200'
            ]);
        }else{
            $irrigattion->delete();
            return response()->json([
                'status'=>'400'
            ]);

        }
    }
}

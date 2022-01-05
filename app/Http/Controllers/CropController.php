<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\CropShow;
use App\Models\Land;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CropController extends Controller
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
                 'item' => 'required',
                    'agricultureHistory' => 'required',
                    'cultivatedArea' => 'required',
                    'crop' => 'required',
                    'irrigationMethod' => 'required',
                    'depression' => 'nullable',
                    'causeDepression' => 'nullable|max:200',
                    'endDate' => 'nullable',

            ] ,[]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages()
                ]);
            } else {
            if(isset($request->depression)){
                if($request->depression = 'true'){
                    $depression = 1;
                }
            } else{
                    $depression = 0;
                }

                Crop::insert([
                    'item' => $request->post('item'),
                    'agricultureHistory' => $request->post('agricultureHistory'),
                    'cultivatedArea' => $request->post('cultivatedArea'),
                    'crop' => $request->post('crop'),
                    'land_id' => $request->post('land_id'),
                    'irrigationMethod' => $request->post('irrigationMethod'),
                    'depression' => $depression,
                    'causeDepression' => $request->post('causeDepression'),
                    'endDate' => $request->post('endDate'),
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

    public function crops(){

        $land = Land::latest()->select('id')->first();
        $crops = Crop::where('land_id',$land->id)->get();
        return response()->json([
            'crops'=>$crops
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crop  $crop
     * @return \Illuminate\Http\Response
     */
    public function show(Crop $crop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crop  $crop
     * @return \Illuminate\Http\Response
     */
    public function edit($land_id)
    {
        $item= Crop::where('land_id',$land_id)->get();
        if (!$item){

            return response()->json([
                'status'=>400
            ]);

        }else{

            return response()->json([
                'status'=>200,
                'crops'=>$item
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crop  $crop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crop $crop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crop  $crop
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crop = Crop::find($id);

        if(!$crop){
            return response()->json([
                'status'=>'200'
            ]);
        }else{
            $crop->delete();
            return response()->json([
                'status'=>'400'
            ]);

        }
    }
}

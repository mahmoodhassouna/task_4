<?php

namespace App\Http\Controllers;

use App\Models\Land;
use App\Models\Vegetable;
use App\Models\VegetableShow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class VegetableController extends Controller
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

    public function vegetables(){
        $land = Land::latest()->select('id')->first();
        $vegetables = Vegetable::where('land_id',$land->id)->get();
        return response()->json([
            'vegetables'=>$vegetables
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
                'item' => 'required',
                'area' => 'required|numeric',
                'date' => 'required',

            ] ,[
                    'land_id.required'=>'يجب اضافة مزارع لمواصلة الاضافة'

                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages()
                ]);
            } else {


                Vegetable::insert([
                    'item' => $request->post('item'),
                    'date' => $request->post('date'),
                    'area' => $request->post('area'),
                    'protection' => $request->post('protection'),
                    'protectionType' => $request->post('protectionType'),
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
     * @param  \App\Models\Vegetable  $vegetable
     * @return \Illuminate\Http\Response
     */
    public function show(Vegetable $vegetable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vegetable  $vegetable
     * @return \Illuminate\Http\Response
     */
    public function edit($land_id)
    {
        $item= Vegetable::where('land_id',$land_id)->get();
        if (!$item){

            return response()->json([
                'status'=>400
            ]);

        }else{

            return response()->json([
                'status'=>200,
                'vegetables'=>$item
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vegetable  $vegetable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vegetable $vegetable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vegetable  $vegetable
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $v = Vegetable::find($id);

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

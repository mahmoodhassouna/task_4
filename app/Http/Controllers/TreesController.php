<?php

namespace App\Http\Controllers;

use App\Models\Land;
use App\Models\Trees;
use App\Models\TreesShow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TreesController extends Controller
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

         public function trees()
        {
            $land = Land::latest()->select('id')->first();

            $trees = Trees::where('land_id',$land->id)->get();
            return response()->json([
                'trees'=>$trees
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


                Trees::insert([
                    'item' => $request->post('item'),
                    'date' => $request->post('date'),
                    'area' => $request->post('area'),
                    'protection' => $request->post('protection'),
                    'treeNumber' => $request->post('treeNumber'),
                    'irrigationMethod' => $request->post('irrigationMethod'),
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
     * @param  \App\Models\Trees  $trees
     * @return \Illuminate\Http\Response
     */
    public function show(Trees $trees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trees  $trees
     * @return \Illuminate\Http\Response
     */
    public function edit($land_id)
    {
        $item= Trees::where('land_id',$land_id)->get();
        if (!$item){

            return response()->json([
                'status'=>400
            ]);

        }else{

            return response()->json([
                'status'=>200,
                'trees'=>$item
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trees  $trees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trees $trees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trees  $trees
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $v = Trees::find($id);

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

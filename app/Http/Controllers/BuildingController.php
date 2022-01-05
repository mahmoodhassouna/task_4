<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Land;
use App\Models\ShowBulding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BuildingController extends Controller
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
                'type'=> 'required',
                'ownerBuild'=> 'required',
                'note'=> 'required|max:200',
                'area'=> 'required|numeric',
                'land_id'=>'required|numeric|exists:lands,id'

            ] ,[]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages()
                ]);
            } else {


                Building::insert([
                    'type' => $request->post('type'),
                    'ownerBuild' => $request->post('ownerBuild'),
                    'note' => $request->post('note'),
                    'area' => $request->post('area'),
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
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function show(Building $building)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit($land_id)
    {
        $building= Building::where('land_id',$land_id)->get();
        if (!$building){

            return response()->json([
                'status'=>400
            ]);

        }else{

            return response()->json([
                'status'=>200,
                'buildings'=>$building
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $building)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $build = Building::find($id);

        if(!$build){
            return response()->json([
                'status'=>'200'
            ]);
        }else{
            $build->delete();
            return response()->json([
                'status'=>'400'
            ]);

        }
    }

    public function buildings(){
        $land = Land::latest()->select('id')->first();
        $buildings = Building::where('land_id',$land->id)->get();
        return response()->json([
            'buildings'=>$buildings
        ]);
    }




}

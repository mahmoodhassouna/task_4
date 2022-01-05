<?php

namespace App\Http\Controllers;

use App\Models\Land;
use App\Models\Partner;
use App\Models\Partner_Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
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
                'idNumber'=> 'required|numeric|digits:9|unique:partners,idNumber',
                'partnershipRatio'=> 'required|numeric',
                'name'=> 'string|required|max:30',
                'partnerType'=> 'required',
                'land_id'=>'required|numeric|exists:lands,id'

            ] ,[]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages()
                ]);
            } else {


                Partner::insert([
                    'partnershipRatio' => $request->post('partnershipRatio'),
                    'partnerType' => $request->post('partnerType'),
                    'idNumber' => $request->post('idNumber'),
                    'name' => $request->post('name'),
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
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit($land_id)
    {
        $partner = Partner::where('land_id',$land_id)->get();
        if (!$partner){
            return response()->json([
                'status'=>400
            ]);
        }else{
            return response()->json([
                'status'=>200,
                'partners'=>$partner
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return $id;
        $partner2 = Partner::find($id);

        if(!$partner2){
            return response()->json([
                'status'=> 400,
                'msg'=>' غير موجودة'
            ]);
        }else{
            $partner2->delete();
            return response()->json([
                'status'=> 200,
                'msg'=>'تم العملية بنجاح'
            ]);
        }
    }

    public function partners(){
        $land = Land::latest()->select('id')->first();
        $partners = Partner::where('land_id',$land->id)->get();
        return response()->json([
            'partners'=>$partners
        ]);
    }



}

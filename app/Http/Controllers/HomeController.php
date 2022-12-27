<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Units;
use App\Models\quarter;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function enjaz()
    {
        $company=DB::table('brokers')->first();
        $quarters=quarter::where('region_id','1')->get();
        $units=DB::table('units')->join('realties','realties.id','=','units.realty_id')
        ->select('units.type as unit_type','rent_cost','main_show','img','units.size as unit_size','bathrooms','rooms','realties.address as address')
        ->where('units.status','empty')
        ->take(3)->get();
      return view ('main')->with(['units'=>$units,'quarters'=>$quarters,'company'=>$company]);
    }
    public function property_search(Request $request)
    {
        $quarters=quarter::where('region_id','1')->get();
        //type  address  rent_value

        $s1=$request->type;
        $s3=$request->location;
        $s4=$request->cost;
       //return $s1;
        if($s1!=""){$s1=$request->type;}else{$s1="%";}
        if($s3!=""){

            $s3=$request->location; }else{$s3="%";}
        if($s4!=""){$s4=$request->cost;}else{$s4="%";}
        //return $request->month;
        $units=DB::table('units')->join('realties','realties.id','=','units.realty_id')
        ->select('units.type as unit_type','rent_cost','main_show','img','units.size as unit_size','bathrooms','rooms','realties.address as address')
        ->where([
              'units.status'=>'empty',
               'units.type'=>$s1,
              'units.quarter'=>$s3,
              'units.rent_cost'=>$s4
            ])
        ->paginate(6);

      return view ('search_result')->with(['units'=>$units,'quarters'=>$quarters,'s1'=>$s1,'s3'=>$s3,'s4'=>$s4]);

    }
      public function autocomplete(Request $request)
    {
        $data = quarter::select("name")
                    ->where('name', 'LIKE', '%'. $request->get('query'). '%')
                    ->get();

        return response()->json($data);
    }
    public function categories($key)
    {
        $quarters=quarter::where('region_id','1')->get();
        $reaults=DB::table('units')->join('realties','realties.id','=','units.realty_id')
        ->select('units.type as unit_type','rent_cost','main_show','img','units.size as unit_size','bathrooms','rooms','realties.address as address')
        ->where([
               'units.type'=>$key,
            ])
        ->paginate(6);


        return view('categories')->with([
            'key'=>$key,
            'quarters'=>$quarters,
            'units'=>$reaults,
        ]);
    }
    public function all_units()
    {
        $quarters=quarter::where('region_id','1')->get();
        $units=DB::table('units')->join('realties','realties.id','=','units.realty_id')
        ->select('units.type as unit_type','rent_cost','main_show','img','units.size as unit_size','bathrooms','rooms','realties.address as address')
        ->where('units.status','empty')
        ->paginate(6);
      return view ('units')->with(['units'=>$units,'quarters'=>$quarters]);

    }
}

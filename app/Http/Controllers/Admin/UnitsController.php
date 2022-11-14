<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Realty;
use App\Models\Units;
use App\Models\org_envoices;
use Illuminate\Http\Request;


class UnitsController extends Controller
{

     /**
     * return states list.
     *
     * @return json
     */
    public function getunits(Request $request)
    {
        $unit_le=Lease_units::where('lease_id',$request->lease_id)->pluck('unit_id');
        $units=Units::where('id',$unit_le)->latest()->paginate(5);
        if (count($units) > 0) {
            return response()->json($units);
        }
    }
    public function realty_units_show($id)
    {

        $units=Units::where('realty_id',$id)->latest()->paginate(5);
        return view('Admin.Units.index',compact('units'));

    }
    public function realty_units_add($id)
    {
        $realty=Realty::where('id',$id)->first();
        return view('Admin.Units.create',compact('realty'));

    }
    public function realty_units_store($id,Request $request)
    {

            Units::create([
                    'realty_id'=> $id,
                    'type'=> $request->type,
                    'role_number'=> $request->role_number,
                    'number'=> $request->number,
                    'size'=> $request->size,
                    'furnished_mode'=> $request->furnished_mode,
                    'kitchen_Cabinets'=> $request->kitchen_Cabinets,
                    'condition_units'=> $request->condition_units,
                    'condition_type'=> $request->condition_type,
                    'water_number'=> $request->water_number,
                    'Elecrtricity_number'=>$request->electricity_number,
                    'details'=>$request->details,
                    'bathrooms'=>$request->bathrooms,
                    //'status'=>$request->status,
                    //start_date
                    //end_date
                    //name_tenant
                ]);
            //toastr()->success(trans('messages.success'));

            return redirect()->route('realty_units_add',$id)->with([
                'message' => 'Unit Added successfully',
                'alert-type' => 'success',
            ]);
    }
    public function rented_units()
    {
         //lease - unit : many to many
         // unit - tenant : many to many
         // reality - unit :  one to many
         $units=Units::where('status','rented')->with('leases','tenants')->latest()->paginate(5);
        return view('Admin.Units.rented_units',compact('units'));
    }
    public function empty_units()
    {
         //lease - unit : many to many
         // unit - tenant : many to many
         // reality - unit :  one to many
         $units=Units::where('status','empty')->with('realties')->latest()->paginate(5);
        return view('Admin.Units.empty_units',compact('units'));
    }
    public function show($id)
    {
        $unit = Units::with('realties')->where('id',$id)->latest()->paginate(5);
        return view('Admin.Units.show',compact('unit'));
    }
     public function units_add($id)
     {
        return view('Admin.Units.create')->with(['id'=>$id]);
     }
     public function store(Request $request,$id)
     {
        try {
            Units::create([
                    'realty_id'=>$id,
                    'type'=> $request->type,
                    'role_number'=> $request->role_number,
                    'unit_name'=> $request->unit_name,
                    'number'=> $request->number,
                    'size'=> $request->size,
                    'furnished_mode'=> $request->furnished_mode,
                    'kitchen_Cabinets'=> $request->kitchen_Cabinets,
                    'condition_units'=> $request->condition_units,
                    'condition_type'=> $request->condition_type,
                    'water_number'=> $request->water_number,
                    'electricity_number'=>$request->electricity_number,
                    'details'=>$request->details,
                    'bathrooms'=>$request->bathrooms,
                    // 'tenant_id'=> $request->tenant_id,
                    //'status'=>$request->status,
                ]);
            //toastr()->success(trans('messages.success'));
            return redirect()->route('realty_units_show',$id)->with([
                'message' => 'Realty edited successfully',
                'alert-type' => 'success',
            ]);
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

     }
     public function edit($id)
     {
        $unit= Units::where('id',$id)->first();
        return view('Admin.Units.edit',compact('unit'));

     }
     public function update(Request $request,$id)
     {
        $unit = Units::findorFail($id);
        $unit->update([
            'realty_id'=> $id,
            'type'=> $request->type,
            'role_number'=> $request->role_number,
            'number'=> $request->number,
            'size'=> $request->size,
            'furnished_mode'=> $request->furnished_mode,
            'kitchen_Cabinets'=> $request->kitchen_Cabinets,
            'condition_units'=> $request->condition_units,
            'condition_type'=> $request->condition_type,
            'water_number'=> $request->water_number,
            'Elecrtricity_number'=>$request->electricity_number,
            'details'=>$request->details,
            'bathrooms'=>$request->bathrooms,
            //'status'=>$request->status,
            //start_date
            //end_date
            //name_tenant
                ]);
            //toastr()->success(trans('messages.success'));
            return redirect()->route('realty_units_show',$id)->with([
                'message' => 'Realty edited successfully',
                'alert-type' => 'success',
            ]);

    }
     public function destroy($id)
     {
        try
        {
            Units::destroy($id);

            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

     }

}

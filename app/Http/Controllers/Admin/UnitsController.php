<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Realty;
use App\Models\Units;
use App\Models\quarter;
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

        $realty=Realty::where('id',$id)->first();
        $units=Units::where('realty_id',$id)->latest()->paginate(5);
        return view('Admin.Units.realty_units',compact('units','realty'));


    }
    public function realty_units_add($id)
    {

         $realty=Realty::where('id',$id)->first();
        $units_count=Units::where('realty_id',$id)->get();
        if($units_count->count() < $realty->units+$realty->shopsNo)
        {
        $realty=Realty::where('id',$id)->first();
        return view('Admin.Units.create',compact('realty'));
        }
        else
        {
        session()->flash('max', 'عذرا, لقد بلغت الحد الأقصى للوحدات الايجارية في هذه المنشأة');
        return back();
        }

    }
    public function realty_units_store($id,Request $request)
    {

        $realty=Realty::where('id',$id)->first();
        $units_count=Units::where('realty_id',$id)->get();
        $image_name='doc-'.time().'.'.$request->img->extension();


         $request->img->move(public_path('units'),$image_name);

        if($units_count->count() < $realty->units)
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
                    'details'=>$request->main_show,
                    'bathrooms'=>$request->bathrooms,
                    'rooms'=>$request->rooms,
                    'quarter'=>$realty->quarters->name,
                    'main_show'=>$request->main_show,
                    'elect_number'=>$request->elect_number,
                    'img'=>$image_name,
                    'rent_cost'=>$request->rent_cost,
                    'address'=>$realty->address,

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
        else
        {
                    session()->flash('max', 'عذرا, لقد بلغت الحد الأقصى للوحدات الايجارية في هذه المنشأة');
            return redirect()->route('realties.index')->with([
                'message' => 'عذرا, لقد بلغت الحد الأقصى للوحدات الايجارية في هذه المنشأة',
                'alert-type' => 'success',
            ]);
        }
    }
    public function rented_units()
    {
         //lease - unit : many to many
         // unit - tenant : many to many
         // reality - unit :  one to many
         $count_realties = Realty::count();
$count_units=Units::count();
$count_units_added=Units::count();
$count_units_rented=Units::where('status','rented')->count();
         $units=Units::where('status','rented')->with('leases','tenants')->latest()->paginate(5);


        return view('Admin.Units.rented_units')->with([
                  'units'=>$units,
                  'count_realties'=>$count_realties,
                  'count_units'=>$count_units,
                  'count_units_added'=>$count_units_added,
                  'count_units_rented'=>$count_units_rented,




        ]);
    }
    public function empty_units()
    {
         //lease - unit : many to many
         // unit - tenant : many to many
         // reality - unit :  one to many
         $count_realties = Realty::count();
$count_units=Units::count();
$count_units_added=Units::count();
$count_units_rented=Units::where('status','rented')->count();
         $units=Units::where('status','empty')->with('realties')->latest()->paginate(5);

        return view('Admin.Units.empty_units')->with([
                  'units'=>$units,
                  'count_realties'=>$count_realties,
                  'count_units'=>$count_units,
                  'count_units_added'=>$count_units_added,
                  'count_units_rented'=>$count_units_rented,




        ]);
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
        $realty=Realty::where('id',$id)->first();
        $units_count=Units::where('realty_id',$id)->get();
        if($units_count->count() < $realty->units)
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
                    'details'=>$request->details,
                    'bathrooms'=>$request->bathrooms,
                    /*
                     'address'=>$request->address,
                    'quarter'=>$request->quarter,
                    */
                    'main_show'=>$request->main_show,
                    'elect_number'=>$request->elect_number,
                    'rent_cost'=>$request->rent_cost,
                    'img'=>$request->img,
                    'address'=>$realty->address,
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
    else
    {

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
        $realty=Realty::where('id',$unit->realty_id)->first();

          $image_name='doc-'.time().'.'.$request->img->extension();

         $request->img->move(public_path('units'),$image_name);
        $unit->update([

                    'type'=> $request->type,
                    'role_number'=> $request->role_number,
                    'number'=> $request->number,
                    'size'=> $request->size,
                    'furnished_mode'=> $request->furnished_mode,
                    'kitchen_Cabinets'=> $request->kitchen_Cabinets,
                    'condition_units'=> $request->condition_units,
                    'condition_type'=> $request->condition_type,
                    'details'=>$request->main_show,
                    'bathrooms'=>$request->bathrooms,
                    'rooms'=>$request->rooms,
                    'quarter'=>$realty->quarters->name,
                    'main_show'=>$request->main_show,
                    'elect_number'=>$request->elect_number,
                    'img'=>$image_name,
                    'rent_cost'=>$request->rent_cost,
                    'address'=>$realty->address,
            //'status'=>$request->status,
            //start_date
            //end_date
            //name_tenant
                ]);
            //toastr()->success(trans('messages.success'));
            return redirect()->route('empty_units')->with([
                'message' => 'Realty edited successfully',
                'alert-type' => 'success',
            ]);

    }
     public function destroy($id)
     {


        try
        {
            Units::destroy($id);

             return redirect()->route('empty_units')->with([
                'message' => 'Unit deleted successfully',
                'alert-type' => 'success',
            ]);
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

     }
     public function site_units()
     {
        $count_units=Units::count();
$count_units_added=Units::count();
$count_units_rented=Units::where('status','rented')->count();
  $count_realties = Realty::count();

        $quarters=quarter::where('region_id','1')->get();
        $units=Units::where('status','empty')
        ->paginate(6);
      return view ('Admin.Units.site_units')->with(['units'=>$units,'quarters'=>$quarters,'count_units'=>$count_units,'count_units_added'=>$count_units_added,'count_units_rented'=>$count_units_rented,'count_realties'=>$count_realties]);
     }

}

<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Lease_units;
use App\Models\receives;
use App\Models\Lease;
use App\Models\Units;
use App\Http\Controllers\Controller;
class receive_reports extends Controller
{
    public function index()
    {
        $receives=receives::with('unit','lease')->latest()->paginate(5);

        return view('Admin.Receives_Reports.index',compact('receives'));
    }

    public function create()
    {

        $leases=Lease::all();

        return view('Admin.Receives_Reports.create',compact('leases'));


    }
    public function details($id)
    {
       $receive=receives::with('unit','lease')->where('id',$id)->first();
        return view('Admin.Receives_Reports.details',compact('receive'));
    }
    public function store(Request $request)
    {
        $unit=Lease::where('id',$request->lease_id)->first();
        receives::create([
            //'lease_number'=>$request->lease_number,
            'unit_id'=>$unit->unit_id,
            'lease_id'=>$request->lease_id,
            'receive_date'=>$request->receive_date,
            'paymennts_status'=>$request->paymennts_status,
            'maint_status'=>$request->maint_status,
            'notes'=>$request->notes,
        ]);
        return redirect()->route('receives_reports.index')->with([
            'message' => 'receives_reports created successfully',
            'alert-type' => 'success',
        ]);

    }

    public function edit($id)
    {
        $receive=receives::where('id',$id)->first();
        return view('Admin.Receives_Reports.edit',compact('receive'));
    }
    public function update($id)
    {
        $receive=receives::where('id',$id)->first();
        $unit=Lease::where('id',$request->lease_id)->first();
        $receive->update([
             'unit_id'=>$unit->unit_id,
            'lease_id'=>$request->lease_id,
            'receive_date'=>$request->receive_date,
            'paymennts_status'=>$request->paymennts_status,
            'maint_status'=>$request->maint_status,
            'notes'=>$request->notes,
        ]);
    }

    public function destroy($id)
    {
        try {
            receives::destroy($id);

            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}

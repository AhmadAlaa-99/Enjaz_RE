<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;

class MainTenancesController extends Controller
{


    public function requestMe()
    {
        return view('Tenant.MainTenance.requestForm');
    }

    public function sendRequest(Request $request)
    {
        $unit_id=1;
        $real_id=1;
        Maintenance::create([
            'desc'=>$request->desc,
            'tenant_id'=>Auth::user()->id,
            'unit_id'=>$unit_id,
            'real_id'=>$real_id,
            //'notes'=>$request->notes,
            //'status'=>$request->status, default(0)
            //'cost'=>$request->cost,

            'request_date'=>Carbon::now(),
           // 'response_date'=>$request->response_date,
        ]);
        //send notify to TenantMail
        //send notify to OwnerMail

        return redirect()->back();
    }
    public function accept($id)
    {
        Maintenance::where('id',$id)->update([
            'status'=>'0',
            'cost'=>$request->cost,
            'response_date'=>Carbon::now(),
        ]);
        //send notify TenantMail

    }
    public function refuse($id)
    {
        Maintenance::where('id',$id)->update([
            'status'=>'-1',
           // 'cost'=>$request->cost,
           'notes'=>$request->notes,
            'response_date'=>Carbon::now(),
        ]);
        //send notify TenantMail

    }
    public function index() //all
    {
        $maintenance=Maintenance::all()->latest()->paginate(5);
        return view('Tenant.MainTenance.index,',compact('maintenance'));
    }

    public function TenantRequest() //Tenant
    {
        $maintenance=Maintenance::where('tenant_id',Auth::user()->id)->latest()->paginate(5);
        return view('Tenant.MainTenance.index,',compact('maintenance'));

    }
    public function ownerRequest()  //Owner
    {        //get id real_state
         $user=Auth::user()->id;
         $owner=owners::where('email',$user->email)-first();
         $real=Realty::where('envoy_id',$owner->id)->first();
         $maintenances=Maintenance::where('real_id',$real->id)->latest()->paginate(5);
         return view('Tenant.MainTenance.index,',compact('maintenances'));




    }
}

<?php

namespace App\Http\Tenant\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;

class MainTenancesController extends Controller
{
    public function request_form()
    {
        return view('MainTenance.requestForm');
    }
    public function request_store(Request $request)
    {
        $user=User::where('id',Auth::user()->id)->first();
        $tenant_id=Tenant::where('t_email',$user->email);
        Maintenance::create([
            'desc'=>$request->desc,
            'tenant_id'=>$tenant_id,
             //'notes'=>$request->notes,
             //'status'=>$request->status, default(0)
             //'cost'=>$request->cost,
            'request_date'=>Carbon::now(),
             // 'response_date'=>$request->response_date,
        ]);
        return redirect()->route('request.form')->with([
            'message' => 'Maint send successfully',
            'alert-type' => 'success',
        ]);
    }
    public function maints_requests() //Tenant
    {
        $maintenance=Maintenance::where('tenant_id',Auth::user()->id)->get();
        return view('Tenants.maints_requests,',compact('maintenance'));
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
        $maintenance=Maintenance::all()->get();
        return view('Tenant.MainTenance.index,',compact('maintenance'));
    }


    public function ownerRequest()  //Owner
    {        //get id real_state
         $user=Auth::user()->id;
         $owner=owners::where('email',$user->email)-first();
         $real=Realty::where('envoy_id',$owner->id)->first();
         $maintenances=Maintenance::where('real_id',$real->id)->get();
         return view('Tenant.MainTenance.index,',compact('maintenances'));




    }
}

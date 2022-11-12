<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Maintenance;
use Auth;

class MainTenancesController extends Controller
{

/*
tenant_id
unit_id
real_id
notes
desc
status
cost
request_date
response_date*/
    public function requestMe()
    {

        return view('Tenant.MainTenance.requestForm');
    }

    public function sendRequest(Request $request,$id)
    {

    }
    public function accept($id)
    {
        Maintenance::where('id',$id)->update([
            'status'=>'0',
            'cost'=>$request->cost,
            'response_date'=>Carbon::now(),
        ]);
        //send notify TenantMail
        Notification::send($owner,new \App\Notifications\MaintAcceptNotify($user));

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
        Notification::send($owner, new \App\Notifications\MaintRefuseNotify($user));

    }






    public function accept_requests() //1
    {

        $maints=Maintenance::where('status','1')->with('units')->get();
        return view('Admin.MainTenance.accepted',compact('maints'));
    }
    public function refuse_requests() //2
    {

       $maints=Maintenance::where('status','2')->with('units')->get();

        return view('Admin.MainTenance.refuse',compact('maints'));
    }
    public function wait_request() //0
    {
        $maints=Maintenance::where('status','0')->with('units')->get();

        return view('Admin.MainTenance.wait',compact('maints'));
    }








    public function TenantRequest() //Tenant
    {
        $maintenance=Maintenance::where('tenant_id',Auth::user()->id)->get();
        return view('Admin.Tenant.MainTenance.index,',compact('maintenance'));

    }
    public function ownerRequest()  //Owner
    {        //get id real_state
         $user=Auth::user()->id;
         $owner=owners::where('email',$user->email)-first();
         $real=Realty::where('envoy_id',$owner->id)->first();
         $maintenances=Maintenance::where('real_id',$real->id)->get();
         return view('Admin.Tenant.MainTenance.index,',compact('maintenances'));




    }
}

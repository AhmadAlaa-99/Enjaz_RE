<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Tenant;
use App\Models\Units;
use App\Models\User;
use App\Models\Maintenance;
use Carbon\Carbon;
use App\Models\Lease;
use App\Models\Payments;
class TenantController extends Controller
{
    public function leases()
    {
        $tenant=Tenant::where('user_id',Auth::user()->id)->first();
        $leases=Lease::where('tenant_id',$tenant->id)->with('tenants','organization','realties','units','financial')
        /*->select('number','type','st_rental_date','end_rental_date')*/->latest()->paginate(5);
         return view('Tenant.myleases',compact('leases'));
    }

    public function tn_lease_details($id)
    {
        $tenant=Tenant::where('user_id',Auth::user()->id)->first();
        $lease=Lease::where('tenant_id',$tenant->id)->with('organization','units','realties','financial')->where('id',$id)->first();
        $tenant=Tenant::where('id',$tenant->id)->with('user')->first();
        $payments=Payments::where('lease_id',$lease->id)->latest()->paginate(5);
        $broker=User::first();
        return view('Tenant.leases_details',compact('lease','tenant','payments','broker'));
    }






     public function request_form()
    {

        return view('Tenant.request_form');
    }

    public function request_send(Request $request)
    {
        $user=Auth::user();
        $tenant=Tenant::where('user_id',$user->id)->first();
        $real=Units::where('id',$tenant->units->id)->first();
        Maintenance::create([
            'desc'=>$request->desc,
            'tenant_id'=>$tenant->id,
            'unit_id'=>$tenant->units->id,

            //'notes'=>$request->notes,
            //'status'=> default(progress)
            //'cost'=>$request->cost,
            'request_date'=>Carbon::now(),
           'response_date'=>Carbon::now(),
        ]);
        //send notify to OwnerMail
        //$owner_id=Reality::where('id',$real_id)->pluck('owner_id');
       // $owner=User::where('id',$owner_id)->first();
      //  Notification::send($owner, new \App\Notifications\OwnerMaints($user));
        return redirect()->back();
    }

    public function maints_requests()
    {
        $tenant=Tenant::where('user_id',Auth::user()->id)->first();
        $maintenances=Maintenance::where('tenant_id',$tenant->id)->latest()->paginate(5);
        return view('Tenant.maints_requests',compact('maintenances'));
    }


}

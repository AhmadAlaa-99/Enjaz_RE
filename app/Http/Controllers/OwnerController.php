<?php

namespace App\Http\Controllers;
use App\Models\Tenant;
use App\Models\User;
use App\Models\Realty;
use App\Models\organization;
use Auth;
use App\Models\Units;
use Illuminate\Http\Request;
use App\Models\Lease;
class OwnerController extends Controller
{
    //show information tenants in
    public function actived_tenants()
    {
        $user=Auth::user();
         $owner=organization::where('email',$user->email);
        $tenants=Tenant::where('status','actived')->with('user','units')->get();
        return view('Owner.Tenants.index',compact('tenants'));
    }
    public function archive_tenants()
    {
        $user=Auth::user();
        $owner=organization::where('email',$user->email);
        $tenants=Tenant::where('status','archived')->with('user','units')->get();
        return view('Owner.Tenants.archived',compact('tenants'));
    }

public function all_realties()
{
    $org_id=organization::where('email',Auth::user()->email)->first();
    $realties = Realty::where('owner_id',$org_id)->with('organization')->get();
        if($realties->count()>0)
        {
        foreach($realties as $realty)
        {
            $units_tn= Units::where(['realty_id'=>$realty->id,'status'=>'rent'])->get();

        }
    }
    else
    {
        $units_tn='0';
    }
        return view('Owner.Realties.index',compact('realties','units_tn'));
}
public function empty_units()
{
        $org_id=organization::where('email',Auth::user()->email)->first();
        $realties=Realty::where('owner_id',$org_id)->get();
     $units=Units::where(['status'=>'empty','realty_id'=>$realties->id])->with('leases','tenants','realties')->get();
    return view('Owner.Realties.empty_units',compact('units'));

}
public function rented_units()
{
     $org_id=organization::where('email',Auth::user()->email)->first();
        $realties=Realty::where('owner_id',$org_id)->get();
     $units=Units::where(['status'=>'rented','realty_id'=>$realties->id])->with('leases','tenants','realties')->get();
    return view('Owner.Realties.rented_units',compact('units'));


}




public function expired_leases()
{
    $org=organization::where('email',Auth::user()->email)->first();
    $Lease=Lease::where(['org_id'=>$org->id,'status'=>'expired'])->with('tenants','organization','realties','units','financial')->get();
    return view('Owner.Leases.expired_leases')->with([/*'next_payments_date'=>$next_payments_date,*/'leases'=>$Lease]);
}
public function actived_leases()
{
    $org=organization::where('email',Auth::user()->email)->first();
    $Lease=Lease::where(['org_id'=>$org->id,'status'=>'expired'])->with('tenants','organization','realties','units','financial')->get();
    return view('Owner.Leases.actived_leases')->with([/*'next_payments_date'=>$next_payments_date,*/'leases'=>$Lease]);
}

public function details_lease($id)
{
        $lease=Lease::with('organization','units','realties','financial')->where('id',$id)->first();
        $tenant=Tenant::where('id',$lease->tenant_id)->with('user')->first();
        $payments=Payments::where('lease_id',$lease->id)->get();
        $broker=User::first();
        return view('Owner.Leases.details_lease',compact('lease','tenant','payments','broker'));
}

public function statistics()
{
     $org=organization::where('email',Auth::user()->email)->first();
    //units   realties    leases
   $leases=Lease::where('org_id',$org->id)->count();
    $realties=Realty::where('owner_id',$org->id)->count();
    $units=Units::where('realty_id',$realties->id)->count();
    return view('Owner.statistics',compact('leases','realties','units'));
}






}

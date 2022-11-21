<?php

namespace App\Http\Controllers;
use App\Models\Tenant;
use App\Models\User;
use App\Models\Realty;
use App\Models\organization;
use Auth;
use App\Models\Payments;
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
        $tenants=Tenant::where('status','actived')->with('user','units')->latest()->paginate(5);
        return view('Owner.Tenants.index',compact('tenants'));
    }
    public function archive_tenants()
    {
        $user=Auth::user();
        $owner=organization::where('email',$user->email);
        $tenants=Tenant::where('status','archived')->with('user','units')->latest()->paginate(5);
        return view('Owner.Tenants.archived',compact('tenants'));
    }

public function all_realties()
{
    $org_id=organization::where('email',Auth::user()->email)->first();
    $realties = Realty::where('owner_id',$org_id->id)->with('organization')->latest()->paginate(5);
    /*
        if($realties->count()>0)
        {
        foreach($realties as $realty)
        {
            $units_tn= Units::where(['realty_id'=>$realty->id,'status'=>'rent'])->latest()->paginate(5);

        }

    }
    else
    {
        $units_tn='0';
    }
        return view('Owner.Realties.index',compact('realties'));
        */
        return view('Owner.Realties.index',compact('realties'));
}
public function show_units($id)
{
            $org_id=organization::where('email',Auth::user()->email)->first();
            $realties=Realty::where('id',$id)->first();
         $units=Units::where(['realty_id'=>$realties->id])->with('leases','tenants','realties')->latest()->paginate(5);

     return view('Owner.Realties.show_units',compact('units'));



}
public function empty_units()
{




}
public function rented_units()
{
     $org_id=organization::where('email',Auth::user()->email)->first();
    $realties=Realty::where('owner_id',$org_id)->latest()->paginate(5);
     $units=Units::where(['status'=>'rented','realty_id'=>$realties->id])->with('leases','tenants','realties')->latest()->paginate(5);
    return view('Owner.Realties.rented_units',compact('units'));


}




public function expired_leases()
{
    $org=organization::where('email',Auth::user()->email)->first();
    $Lease=Lease::where(['org_id'=>$org->id,'status'=>'expired || received'])->with('tenants','organization','realties','units','financial')->latest()->paginate(5);
    return view('Owner.Leases.expired_leases')->with(['leases'=>$Lease]);
}
public function actived_leases()
{
    $org=organization::where('email',Auth::user()->email)->first();
    $Lease=Lease::where(['org_id'=>$org->id,'status'=>'active'])->with('tenants','organization','realties','units','financial')->latest()->paginate(5);
    return view('Owner.Leases.actived_leases')->with(['leases'=>$Lease]);
}

public function details_lease($id)
{
        $lease=Lease::with('organization','units','realties','financial')->where('id',$id)->first();
        $tenant=Tenant::where('id',$lease->tenant_id)->with('user')->first();
        $payments=Payments::where('lease_id',$lease->id)->latest()->paginate(5);
        $broker=User::first();
        return view('Owner.Leases.details_lease',compact('lease','tenant','payments','broker'));
}

public function statistics()
{
     $org=organization::where('email',Auth::user()->email)->first();
    //units   realties    leases
   $leases=Lease::where('org_id',$org->id)->count();
    $realties=Realty::where('owner_id',$org->id)->count();
    $realtie=Realty::where('owner_id',$org->id)->first();
    $units=Units::where('realty_id',$realtie->id)->count();
    return view('Owner.statistics',compact('leases','realties','units'));
}






}

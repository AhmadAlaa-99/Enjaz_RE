<?php

namespace App\Http\Controllers;
use App\Models\Tenant;
use App\Models\User;
use App\Models\organization;
use Auth;
use Illuminate\Http\Request;

class TenantsController extends Controller
{
    //show information tenants in
    public function index()
    {
        $user=User::auth();
        $owner=organization::where('email',$user->email);
        $tenants=Tenant::where('status','actived')->with('user','leases','units')->latest()->paginate(5);
        return view('Owner.Tenants.index',compact('tenants'));
    }
    public function archive_tenants()
    {
        $user=User::auth();
        $owner=organization::where('email',$user->email);
        $tenants=Tenant::where('status','archived')->with('user','leases','units')->latest()->paginate(5);
        return view('Owner.Tenants.archived',compact('tenants'));
    }


}

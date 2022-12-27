<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Broker;
use App\Models\Payments;
use App\Models\Realty;
use App\Models\Lease;
use App\Models\Units;
use App\Models\Contract;
use DB;
use Auth;
use Hash;

class SettingsController extends Controller
{
     public function Account_settings()
     {
         $user=Auth::user();
         return view('settings.account',compact('user'));
     }

     public function Account_edit(Request $request)
     {
         $user=Auth::user();
        $user->update([
            'name'=>$request->name,
            'ID_type'=>$request->ID_type,
            'ID_num'=>$request->ID_num,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address,
        ]);
               return view('settings.account',compact('user'));
     }
      public function company_settings()
     {
         $company=Broker::first();

         return view('settings.company',compact('company'));
     }
      public function company_settings_store(Request $request)
     {
          $company=Broker::first();
          $company->update([
              'date_founded'=>$request->date_founded,
              'about'=>$request->about,
              'vision'=>$request->vision,
              'mission'=>$request->mission,
              'contact_email'=>$request->contact_email,
              'contact_address'=>$request->contact_address,
              'contact_mobile'=>$request->contact_mobile,
          ]);

         return view('settings.company',compact('company'));
     }
      public function privacy_settings()
     {
          return view('settings.privacy');
     }
      public function privacy_settings_store(Request $request)
     {
        $user=Auth::user();
        $this->validate($request, [
           'current_password'=>'required',
        'new_password' => 'required|',
'confirm_password' => 'required|same:new_password',
]);

$input = $request->all();


$input['new_password'] = Hash::make($input['new_password']);

$user->update(['password'=>$input['new_password']]);
return redirect()->route('privacy_settings')
->with('success','تم تغيير كلمة السر بنجاح');

     }
      public function notifications_settings()
     {
         $user=User::where('role_name','Admin')->first();
          return view('settings.notifications',compact('user'));
     }


















     public function profile()
     {
        return view('Profile');
     }
      public function site_setting()
     {
        return view('Admim.Setting.social');
     }

     public function statistics()
     {
        $user=Auth::user();
        if($user->role_name=='Tenant')
        {
           return redirect()->route('leases_tenant');
        }
        else
        {
        $realties=Realty::count();

         $units=Units::count();

         $leases_count=Lease::where('status','active')->count();

         $contracts=Contract::count();

         $contr=DB::table('contracts')->get();
         $contracts_payments=0;
         foreach($contr as $rec) {$contracts_payments+=$rec->rent_value;}

         $query=DB::table('payments')->get();
         $proceeds=0;
         $receivs=0;
         foreach($query as $rec) { $proceeds+=$rec->paid;  $receivs+=$rec->remain;}

         $maints=DB::table('maintenances')->get();
         $maintenances=0;
         foreach($maints as $rec) {  $maintenances+=$rec->cost;}

         $payments=DB::table('payments')->join('leases','payments.lease_id','leases.id')->orderBy('release_date')->take(5)->get();
         $leases=Lease::take(5)->get();
         return view('statistics')->with([
            'realties'=>$realties,
            'units'=>$units,
            'leases_count'=>$leases_count,
            'contracts'=>$contracts,
            'contracts_payments'=>$contracts_payments,
            'proceeds'=>$proceeds,
            'receivs'=>$receivs,
            'maintenances'=>$maintenances,
            'payments'=>$payments,
            'leases'=>$leases,
        ]);
    }
     }
}

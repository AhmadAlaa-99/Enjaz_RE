<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Broker;

class SettingsController extends Controller
{

     public function Account_settings()
     {
         $user=User::where('role_name','Admin')->first();
         return view('Admin.System.setting',compact('user'));
     }

     public function Account_edit(Request $request)
     {

         $user=User::where('role_name','Admin')->first();

        $user->update([
            'name'=>$request->name,
            'nationality'=>$request->nationality,
            'ID_type'=>$request->ID_type,
            'ID_num'=>$request->ID_num,
            'phone'=>$request->phone,
            'telephone'=>$request->telephone,
            'email'=>$request->email
        ]);

         return view('Admin.System.statistics');
     }
     public function profile()
     {
        return view('Profile');
     }

     public function statistics()
     {
        return view('Admin.System.statistics');
     }
}

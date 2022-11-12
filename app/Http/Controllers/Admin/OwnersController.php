<?php

namespace App\Http\Controllers\Admin;
use Spatie\Permission\Models\Role;
use App\Notifications\NewOwnerNotify;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\organization;
use App\Models\User;

class OwnersController extends Controller
{
    public function index()
    {
        $owners=User::where('role_name','Owner')->with('organization')->get();
        return view('Admin.Owners.index',compact('owners'));
    }
    public function show($id)
    {

       // return view('Owners.show',compact('owner'));
    }
     public function create()
     {
        return view('Admin.Owners.create');

     }
     public function store(Request $request)
     {
        //organization :  type commercial_regisration_no  issuer company_name unified_number record_date
        //org_envoies : organization_id name Nationality   ID_type ID_num phone email representation_document_no re_do_type release_date expire_date

            $pass='owner'.random_int(1999999999,9999999999);
            $user= User::create([
                'name'=>$request->name,
                'nationality'=>$request->nationality,
                'ID_type'=>$request->ID_type,
                'ID_num'=>$request->ID_num,
                'phone'=>$request->phone,
                'telephone'=>$request->telephone,
                'email'=>$request->email,
                'role_name'=>'Owner',
                'password'=>bcrypt($pass),
            ]);
            $role=Role::where('name','Owner')->first();
            $user->assignRole([$role->id]);

            organization::create([
                    'email'=>$request->email,
                    'company_name'=> $request->company_name,
                    'record_date'=> $request->record_date,
                ]);



            //send notify
          //  Notification::send($user, new \App\Notifications\NewOwnerNotify($user,$organization,$pass));
            //toastr()->success(trans('messages.success'));
            return redirect()->route('owners.index')->with([
                'message' => 'Owner created successfully',
                'alert-type' => 'success',
            ]);


     }
     public function edit($id)
     {
        $owner=User::where('id',$id)->with('organization')->first();
        return view('Admin.Owners.edit',compact('owner'));
     }
     public function update(Request $request,$id)
     {
        $user=User::where('id',$id)->first();
     //   $user = User::findorFail($id);
        $user->update([
            'name'=>$request->name,
            'nationality'=>$request->nationality,
            'ID_type'=>$request->ID_type,
            'ID_num'=>$request->ID_num,
            'phone'=>$request->phone,
            'telephone'=>$request->telephone,
            'email'=>$request->email,
            'role_name'=>'Owner',
        ]);
       $owner=organization::where('email',$user->email)->update([
        'email'=>$request->email,
      'company_name'=> $request->company_name,
        'record_date'=> $request->record_date,
       ]);
       return redirect()->route('owners.index')->with([
        'message' => 'Owner edited successfully',
        'alert-type' => 'success',
    ]);
    }

     public function destroy($id)
     {
           $user= User::destroy($id);
           // toastr()->error(trans('messages.Delete'));
            return redirect()->route('owners.index')->with([
                'message' => 'Owner deleted successfully',
                'alert-type' => 'success',
            ]);
     }
     public function archive()
     {
        return view('Admin.Archives.owners');

     }
}

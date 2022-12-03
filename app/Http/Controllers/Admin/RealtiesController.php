<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Realty;
use App\Models\Units;
use App\Models\User;

use Illuminate\Http\Request;

class RealtiesController extends Controller
{




    public function index()
    {

        $realties = Realty::latest()->paginate(5);
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
        return view('Admin.Realties.index',compact('realties','units_tn'));
    }


    public function show()
    {

    }
     public function create()
     {
//        $owners=User::where('role_name','Owner')->with('organization')->latest()->paginate(5);

       // $owners=User::where('role_name','Owner')->latest()->paginate(5);
        return view('Admin.Realties.create');

     }
     public function store(Request $request)
     {
        /* address type use roles units lifts parking envoy_id */


               $realty= Realty::create([
                'realty_name'=> $request->realty_name,
                'address'=> $request->address,
                'type'=> $request->type,
                'use'=> $request->use,
                'roles'=> $request->roles,
                'units'=> $request->units,
                'size'=> $request->size,
                'advantages'=> $request->advantages,
                ]);
               // return dd($realty);

            //toastr()->success(trans('messages.success'));
            return redirect()->route('realties.index')->with([
                'message' => 'Realty created successfully',
                'alert-type' => 'success',
            ]);





     }
     public function edit($id)
     {
        $realty = Realty::where('id',$id)->first();
        return view('Admin.Realties.edit',compact('realty'));

     }
     public function update(Request $request,$id)
     {
        $Realty=Realty::where('id',$id)->first();
        $Realty->update([
            'realty_name'=> $request->realty_name,
            'address'=> $request->address,
            'type'=> $request->type,
            'use'=> $request->use,
            'roles'=> $request->roles,
            'units'=> $request->units,
            'size'=> $request->size,
            'advantages'=> $request->advantages,
        ]);
        return redirect()->route('realties.index')->with([
            'message' => 'Realty edited successfully',
            'alert-type' => 'success',
        ]);
    }
     public function destroy($id)
     {
            Realty::destroy($id);
            return redirect()->route('realties.index')->with([
                'message' => 'Realty clean successfully',
                'alert-type' => 'success',
            ]);


     }
}

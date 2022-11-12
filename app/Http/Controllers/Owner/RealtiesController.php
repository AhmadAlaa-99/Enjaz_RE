<?php

namespace App\Http\Controllers;
use App\Models\Realty;
use App\Models\Units;
use App\Models\org_envoices;
use Illuminate\Http\Request;

class RealtiesController extends Controller
{
    
    public function index()
    {
        return view('Admin.Realties.index');
    }
    public function show($id)
    {
        $Real = Realty::with('units','org_envoices')->where('id',$id)->get();
        return view('Admin.Realties.show',compact('owner'));
    }
     public function create()
     {
        return view('Admin.Realties.create');

     }
     public function store(Request $request)
     {
        /* address type use roles units lifts parking envoy_id */
        try {
            Realty::create([
                    'address'=> $request->address,
                    'type'=> $request->type,
                    'use'=> $request->use,
                    'roles'=> $request->roles,
                    'units'=> $request->units,
                    'lifts'=> $request->lifts, 
                    'parking'=> $request->parking,
                    'envoy_id'=> $request->envoy_id,
                ]);
               
            //toastr()->success(trans('messages.success'));
            return redirect()->back();

        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
         
     }
     public function edit($id)
     {
        $Realty = Realty::with('org_envoice')->where('id',$id)->get();
        return view('Admin.Realties.edit',compact('Realty'));
        
     }
     public function update($id)
     {
        $Realty = Realty::findorFail($id);
        $Realty->update([
            'address'=> $request->address,
            'type'=> $request->type,
            'use'=> $request->use,
            'roles'=> $request->roles,
            'units'=> $request->units,
            'lifts'=> $request->lifts, 
            'parking'=> $request->parking,
            'envoy_id'=> $request->envoy_id,
        ]);
        return redirect()->back();
    }
     public function destroy($id)
     {
        try {
            Realty::destroy($id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

     }
}

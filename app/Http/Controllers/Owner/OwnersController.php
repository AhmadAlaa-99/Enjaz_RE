<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\organization;
use App\Models\org_envoies;
class OwnersController extends Controller
{
    public function index()
    {
        return view('Admin.Owners.index');
    }
    public function show($id)
    {
        $owner = organization::with('org_envoice')->where('id',$id)->latest()->paginate(5);
        return view('Admin.Owners.show',compact('owner'));
    }
     public function create()
     {
        return view('Admin.Owners.create');

     }
     public function store(Request $request)
     {
        //organization :  type commercial_regisration_no  issuer company_name unified_number record_date
        //org_envoies : organization_id name Nationality   ID_type ID_num phone email representation_document_no re_do_type release_date expire_date
        try {
            organization::create([
                    'type'=> $request->type,
                    'commercial_regisration_no'=> $request->commercial_regisration_no,
                    'issuer'=> $request->issuer,
                    'company_name'=> $request->company_name,
                    'unified_number'=> $request->unified_number,
                    'record_date'=> $request->record_date,
                ]);
                org_envoies::create([
                    'organization_id'=>$request->id,
                    'name'=> $request->name,
                    'Nationality'=> $request->Nationality,
                    'ID_type'=> $request->ID_type,
                    'ID_num'=> $request->ID_num,
                    'phone'=> $request->phone,
                    'email'=> $request->email,
                    'representation_document_no'=> $request->representation_document_no,
                    're_do_type'=> $request->re_do_type,
                    'release_date'=> $request->release_date,
                    'expire_date'=> $request->expire_date,
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
        $owner = organization::with('org_envoice')->where('id',$id)->latest()->paginate(5);
        return view('Admin.Owners.show',compact('owner'));

     }
     public function update()
     {
        $owner = organization::findorFail($id);
        $owner->update([
                     'type'=> $request->type,
                    'commercial_regisration_no'=> $request->commercial_regisration_no,
                    'issuer'=> $request->issuer,
                    'company_name'=> $request->company_name,
                    'unified_number'=> $request->unified_number,
                    'record_date'=> $request->record_date,
        ]);
        $envoies=org_envoies::where('organization_id',$id)->update([
            'organization_id'=>$request->id,
                    'name'=> $request->name,
                    'Nationality'=> $request->Nationality,
                    'ID_type'=> $request->ID_type,
                    'ID_num'=> $request->ID_num,
                    'phone'=> $request->phone,
                    'email'=> $request->email,
                    'representation_document_no'=> $request->representation_document_no,
                    're_do_type'=> $request->re_do_type,
                    'release_date'=> $request->release_date,
                    'expire_date'=> $request->expire_date,
        ]);
        return redirect()->back();
    }
     public function destroy($id)
     {

        try {
            organization::destroy($id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

     }
}

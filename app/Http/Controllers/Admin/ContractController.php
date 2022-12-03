<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Realty;
use App\Models\contract;
use App\Models\ensollments;
use App\Models\Owner;
use App\Models\quarter;
use DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use File;
use Carbon;

class ContractController extends Controller
{


    public function contract_effictive()
   {
    $contracts=contract::with('realty')->latest()->paginate(5);

      return view('Admin.Leases.contract_effictive',compact('contracts'));
   }

    public function contract_finished()
   {
    $contracts=contract::with('realty')->latest()->paginate(5);

      return view('Admin.Leases.contract_finished',compact('contracts'));
   }



    public function details($id)
   {

    $contract=contract::where('id',$id)->first();
    $realty=Realty::where('id',$contract->realty_id)->first();
    $owner=Owner::where('id',$realty->owner_id)->first();
    $mentos=ensollments::where('contract_id',$contract->id)->get();
    return view('Admin.Leases.contract_details',compact('contract','realty','owner','mentos'));
   }




public function renew_contract($id)
{

    $contract=contract::where('id',$id)->first();

    return view('Admin.Leases.contract_renew')->with([
        'contract'=>$contract,
    ]);
}
public function renew_contracted(Request $request)
{
    $contract=contract::where('id',$request->contract_id)->first();
    $image_name='doc-'.time().'.'.$request->contract_file->extension();

                $request->contract_file->storeAs('storage/Contracts',$image_name);
    if($contract->type=='تجاري')
                {
                $contract->update([
                'contactNo'=>$request->contactNo,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'ejar_cost'=>$request->ejar_cost,
                'rent_value'=>$request->rent_value,
                'contract_file'=>$image_name,
                'type'=>"تجاري",//تجاري - سكني
                'note'=>$request->note,
                'tax'=>$request->tax,
                'tax_amount'=>$request->tax_amount,
                'status'=>"مجدد",
            ]);
        }
        else
        {
                 $contract->update([
                'contactNo'=>$request->contactNo,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'ejar_cost'=>$request->ejar_cost,
                'rent_value'=>$request->ejar_cost,
                'contract_file'=>$image_name,
                'tax'=>'0',
                'tax_amount'=>'0',
                'type'=>"سكني",//تجاري - سكني
                'note'=>$request->note,
                'status'=>"مجدد",
             ]);
        }
            $ens=ensollments::where('contract_id',$contract->id)->get();
            foreach($ens as $e)
            {
                $e->delete();
            }
            foreach($request->installmentNo as $key=>$items )
            {
                $input['contract_id']=$contract->id;
                $input['installmentNo']=$request->installmentNo[$key];
                $input['installment_date']=$request->installment_date[$key];
                $input['payment_date']=$request->payment_date[$key];
                $input['amount']=$request->amount[$key];
                $input['payment_type']=$request->payment_type[$key];
                $input['refrenceNo']=$request->refrenceNo[$key];
                ensollments::create($input);
            }
            return redirect()->route('contract_effictive')->with([
                'message' => 'Realty edited successfully',
                'alert-type' => 'success',
            ]);

}
public function finish_contract($id)
{
    $contract=contract::where('id',$id)->update(['type_s'=>"منتهي"],);
    return redirect()->route('contract_finished')->with([
                'message' => 'Realty edited successfully',
                'alert-type' => 'success',
            ]);

}


   public function down_contract_file($id)
   {
      $file_name=contract::select('contract_file')->where('id',$id)->latest()->paginate(5);
        foreach($file_name as $file)
        {
            $path=storage_path().'/storage/Contracts/'.$file->contract_file;
        }

         return Response::download($path);
   }



   public function contract_residential()
   {
     $type="سكني";
      return view('Admin.Leases.contract_create')->with(['type'=>$type,]);
   }
     public function contract_commercial()
   {
     $type="تجاري";
      return view('Admin.Leases.contract_create')->with(['type'=>$type,]);
   }
    public function contract_store(Request $request)
    {
       Owner::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'mobile'=>$request->mobile,
        'attribute_name'=>$request->attribute_name,
       ]);
       $owner=Owner::latest()->first();
        Realty::create([
                'realty_name'=>$request->realty_name,
                'owner_id'=>$owner->id,
                'quarter'=>$request->quarter,
                'agency_name'=>$request->agency_name,
                'shopsNo'=>$request->shopsNo,
                'agency_mobile'=>$request->agency_mobile,
                  'elevator'=>$request->elevator,
                 'parking'=>$request->parking,
                'type'=> $request->type,
                'use'=> $request->use,
                'roles'=> $request->roles,
                'units'=> $request->units,
                'size'=> $request->size,
                'advantages'=> $request->advantages,
                ]);
                $realty=Realty::latest()->first();
                $image_name='doc-'.time().'.'.$request->contract_file->extension();

                $request->contract_file->storeAs('public/Contracts',$image_name);
                if($request->type_sc=='تجاري')
                {
                contract::create([
                'realty_id'=>$realty->id,
                'contactNo'=>$request->contactNo,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'ejar_cost'=>$request->ejar_cost,
                'rent_value'=>$request->rent_value,
                'contract_file'=>$image_name,
                'type'=>$request->type_sc,//تجاري - سكني
                'note'=>$request->note,
                'tax'=>$request->tax,
                'tax_amount'=>$request->tax_amount,
            ]);
        }
        else
        {
             contract::create([
                'realty_id'=>$realty->id,
                'contactNo'=>$request->contactNo,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'ejar_cost'=>$request->ejar_cost,
                'rent_value'=>$request->ejar_cost,
                'contract_file'=>$image_name,
                  'tax'=>'0',
                'tax_amount'=>'0',
                'type'=>$request->type_sc,//تجاري - سكني
                'note'=>$request->note,
             ]);
        }
            $contract=contract::latest()->first();
            foreach($request->installmentNo as $key=>$items )
            {
                $input['contract_id']=$contract->id;
                $input['installmentNo']=$request->installmentNo[$key];
                $input['installment_date']=$request->installment_date[$key];
                $input['payment_date']=$request->payment_date[$key];
                $input['amount']=$request->amount[$key];
                $input['payment_type']=$request->payment_type[$key];
                $input['refrenceNo']=$request->refrenceNo[$key];
                ensollments::create($input);
            }
            return redirect()->route('contract_effictive')->with([
                'message' => 'Realty edited successfully',
                'alert-type' => 'success',
            ]);
    }

}

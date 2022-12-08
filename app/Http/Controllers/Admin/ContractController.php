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
    $contracts=contract::with('realty')->where('status','جديد')->orwhere('status','مجدد')->latest()->paginate(5);

      return view('Admin.Leases.contract_effictive',compact('contracts'));
   }

    public function contract_finished()
   {
    $contracts=contract::with('realty')->where('status','منتهي')->latest()->paginate(5);

      return view('Admin.Leases.contract_finished',compact('contracts'));
   }

   public function payment_add(Request $request,$id)
  {
    $ensollments=ensollments::where('contract_id',$id)->count();
    $contract=contract::where('id',$id)->first();
    $paid=$contract->paid+$request->amount;
    if($paid>$contract->rent_value)
    {
        session()->flash('max_rent', 'خطأ,المبلغ المدفوع أكبر من المتبقي');
        return back();
    }
    else if($ensollments>=$contract->ensollments_total)
    {
        session()->flash('max_count', 'خطأ,تحقق من عدد الأقساط الكلية');
        return back();
    }
    else
    {

                $input['contract_id']=$id;
                $input['installmentNo']=$request->installmentNo;
                $input['installment_date']=$request->installment_date;
                $input['payment_date']=$request->payment_date;
                $input['amount']=$request->amount;
                $input['payment_type']=$request->payment_type;
                $input['refrenceNo']=$request->refrenceNo;
                ensollments::create($input);
                $contract=contract::where('id',$id)->first();


                $contract->update([
                'paid'=>$paid,
                'remain'=>$contract->rent_value-$paid,
                'ensollments_paid'=>$contract->ensollments_paid++,

            ]);
            return redirect()->back();
        }

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

         $request->contract_file->move(public_path('contracts'),$image_name);
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
                'remain'=>$request->rent_value,
                'ensollments_total'=>$request->ensollments_total
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
                'remain'=>$request->ejar_cost,
                'ensollments_total'=>$request->ensollments_total
             ]);
        }
            $ens=ensollments::where('contract_id',$contract->id)->get();
            foreach($ens as $e)
            {
                $e->delete();
            }
            $count=0;
            $total=0;
            foreach($request->installmentNo as $key=>$items )
            {
                $input['contract_id']=$contract->id;
                $input['installmentNo']=$request->installmentNo[$key];
                $input['installment_date']=$request->installment_date[$key];
                 $input['refrenceNo']=$request->refrenceNo[$key];
                $input['payment_date']=$request->payment_date[$key];
                $input['amount']=$request->amount[$key];
                $input['payment_type']=$request->payment_type[$key];
                $total+=$input['amount'];
                $count++;
                ensollments::create($input);
            }
            $contract->update([
                'paid'=>$total,
                'remain'=>$contract->rent_value-$total,
                'ensollments_paid'=>$count
            ]);
            return redirect()->route('contract_effictive')->with([
                'message' => 'Realty edited successfully',
                'alert-type' => 'success',
            ]);

}
public function finish_contract($id)
{
    $contract=contract::where('id',$id)->update(['type_s'=>"منتهي",'status'=>"منتهي"],);
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
            $path=public_path().'/contracts/'.$file->contract_file;
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

                $request->contract_file->move(public_path('contracts'),$image_name);

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
                'ensollments_total'=>$request->ensollments_total,
                'remain'=>$request->rent_value,
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
                 'ensollments_total'=>$request->ensollments_total,
                'remain'=>$request->ejar_cost,

             ]);
        }
            $contract=contract::latest()->first();
            $count=0;
            $total=0;
            foreach($request->installmentNo as $key=>$items )
            {
                $input['contract_id']=$contract->id;
                $input['installmentNo']=$request->installmentNo[$key];
                $input['installment_date']=$request->installment_date[$key];
                $input['refrenceNo']=$request->refrenceNo[$key];
                $input['payment_date']=$request->payment_date[$key];
                $input['amount']=$request->amount[$key];
                $input['payment_type']=$request->payment_type[$key];
                $total+=$input['amount'];
                $count++;
                ensollments::create($input);
            }
            $contract->update([
                'paid'=>$total,
                'remain'=>$contract->rent_value-$total,
                'ensollments_paid'=>$count
            ]);
            return redirect()->route('contract_effictive')->with([
                'message' => 'Realty edited successfully',
                'alert-type' => 'success',
            ]);
    }

}

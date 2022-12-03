<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Tenant_envoie;
use App\Models\Financial_statements;
use App\Models\Owner_deeds;
use App\Models\Payments;
use App\Models\Commitments;
use App\Models\Lease;
use App\Models\Nationalitie;
use App\Models\User;
use App\Models\Realty;
use App\Models\Units;
use App\Models\organization;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use File;
use Carbon;
use DB;
class LeasesController extends Controller
{

    //reco_number - le_date - st_rental_date - payment_method - type - place - end_rental_date - org_id - org_envoice_id - tenant_id - tenant_envoice_id - broker_id
    //realty_id - unit_id - owner_deeds_id - financial_id - payments_id - commitments

    public function details($id)
    {
        $lease=Lease::with('units','realties','financial')->where('id',$id)->first();
        $tenant=Tenant::where('id',$lease->tenant_id)->with('user')->first();
        $payments=Payments::where('lease_id',$lease->id)->latest()->paginate(5);
        $broker=User::first();
        return view('Admin.Leases.leases_details',compact('lease','tenant','payments','broker'));
    }
    public function lease_un_details($id)
    {
        $lease=Lease::where(['status'=>'active','unit_id'=>$id])->first();
        return $this->details($lease->id);

    }


public function leases_renew($id)
{
    $lease=Lease::where('id',$id)->first();
    $unit=Units::where('id',$lease->unit_id)->first();
    $realty=Realty::where('id',$unit->realty_id)->first();
    $broker=User::where('role_name','Admin')->first();
    $tenant=Tenant::where('id',$lease->tenant_id)->first();
    return view('Admin.Leases.renew',compact('tenant','unit','realty','broker'));
}
public function previous_leases($id)
{
    Lease::where('id',$id)->first();
}
public function leases_renew_store(Request $request)
{

    //    $pass='tenant'.random_int(1999999999,9999999999);
         $request->validate([
        'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:10',
        'ID_num' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:10',
        'telephone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|digits:8',
        ]);
            //sendNotify to renew lease
       //     Notification::send($user, new \App\Notifications\NewTenantNotify($user,$pass));
        return 'f';
            $realty=Realty::where('id',$request->realty_id)->first();
            $financaila=Financial_statements::create([
                'st_rental_date'=>$request->st_rental_date,
                'annual_rent'=>$request->annual_rent,
                'payment_cycle'=>'monthly',//$request->payment_cycle,
                'recurring_rent_payment'=>$request->recurring_rent_payment,
                'num_rental_payments'=>$request->num_rental_payments,
                'end_rental_date'=>$request->end_rental_date,
                'Total'=>$request->Total,
                'payment_channels'=>$request->payment_channels,
            ]);
          //  return 'tete';
        // /   $input['desc']=$request->files;
            Commitments::create(['desc'=>$request->desc]);
           $commit=Commitments::latest()->first();
            $fin=Financial_statements::latest()->first();
            $ten=Tenant::latest()->first();
            $image_name='doc-'.time().'.'.$request->docFile->extension();
            $request->docFile->storeAs('public/Documents',$image_name);
            Lease::create([
                'realty_id'=>$request->realty_id,
                //payments one to many
                'reco_number'=>$request->reco_number,
                'le_date'=>$request->le_date,
                'st_rental_date'=>$request->st_rental_date,
                'type'=>'renew',//$request->type_le,
                'place'=>$request->place,
                'end_rental_date'=>$request->end_rental_date,
                'commitment_id'=>$commit->id, //one to one
                'financial_id'=>$fin->id,  //one to one
                'tenant_id'=>$ten->id, //many to one
                'unit_id'=>$request->unit_id,   //many to one
                'docFile'=>$image_name,

            ]);
            $les=Lease::latest()->first();
            foreach($request->release_date as $key=>$items )
            {
                $input['lease_id']=$les->id;
                $input['release_date']=$request->release_date[$key];
                $input['due_date']=$request->due_date[$key];
                $input['total']=$request->total[$key];
                $input['remain']=$request->total[$key];
                Payments::create($input);
            }
            $financaila->update(['num_rental_payments'=>Payments::where('lease_id',$les->id)->count(),]);

            return redirect()->route('effictive')->with([
                'message' => 'Realty edited successfully',
                'alert-type' => 'success',
            ]);


}


    public function effictive()
    {
        $Lease=Lease::where('status','active')->with('tenants','realties','units','financial')
        /*->select('number','type','st_rental_date','end_rental_date')*/->latest()->paginate(5);
        /*
        foreach($Lease as $lease)
        {
            $date_next=payments::where(['lease_id'=>$lease->id,'due_date'<carbon::now]);
                $next_payments_date=$date_next;
      }
      */
        return view('Admin.Leases.effictive')->with([/*'next_payments_date'=>$next_payments_date,*/'leases'=>$Lease]);
    }
    public function payments_edit(Request $request,$id)
    {
        $payment=Payments::where('id',$id)->first();
        if($request->paid<=$payment->remain)
        {
        $paid=$payment->paid + $request->paid;
        $remain=$payment->total - $paid;
        $payment->update(['paid'=>$paid,'remain'=>$remain]);
        return redirect()->back();
    }
    else
    {
      session()->flash('max', 'خطأ,المبلغ المدفوع أكبر من المتبقي');
      return back();
    }

    }
    public function payment_details($id)
    {
        $payment=Payments::where('id',$id)->first();
        $lease=Lease::where('id',$payment->lease_id)->with('tenants','realties','units','financial')->first();
        return view('Admin.Reports.details',compact('payment','lease'));
    }

    public function finished()
    {
        $Lease=Lease::where('status','received')->orWhere('status','expired')->with('tenants','realties','units','financial')
        /*->select('number','type','st_rental_date','end_rental_date')*/->latest()->paginate(5);
        /*
        foreach($Lease as $lease)
        {
            $date_next=payments::where(['lease_id'=>$lease->id,'due_date'<carbon::now]);
                $next_payments_date=$date_next;
      }
      */
        return view('Admin.Leases.finished')->with([/*'next_payments_date'=>$next_payments_date,*/'leases'=>$Lease]);
    }

    public function archive()
     {
        $leases=Lease::where('status','expired')->with('tenants','owners','realties','units','financial_statements')
        ->select('number','type','st_rental_date','end_rental_date')->latest()->paginate(5);
        return view('Admin.Archives.Lease',compact('leases'));
     }

    public function index()
    {
       // $Lease=Lease::select()->latest()->paginate(5);
        return view('Admin.Leases.index');
    }
    public function show($id)
    {
        $lease = Lease::with()->latest()->paginate(5);
        return view('Admin.Lease.show',compact('lease'));
    }
     public function create(Request $request,$id)
     {

       $nationals= Nationalitie::all();
       $unit=Units::where('id',$id)->first();
       $realty=Realty::where('id',$unit->realty_id)->first();

        $broker=User::where('role_name','owner')->first();
       // return dd($owner->id);
        return view('Admin.Leases.create',compact('unit','realty','broker','nationals'));
     }
     public function store(Request $request)
     {


    //    $pass='tenant'.random_int(1999999999,9999999999);
         $request->validate([
        'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:10',
        'ID_num' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:10',
        'telephone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|digits:8',
        ]);
    $pass='12345678';
           $user= User::create([
               'name'=>$request->t_name,
              'nationalitie_id'=>$request->nationalitie_id,
               'ID_type'=>$request->t_ID_type,
               'ID_num'=>$request->t_ID_num,
               'phone'=>$request->t_phone,
               'telephone'=>$request->t_telephone,
               'email'=>$request->t_email,
               'gender'=>$request->t_gender,
               'role_name'=>'Tenant',
               'password'=>bcrypt('21412123'),
            ]);
            $role=Role::where('name','Tenant')->first();
            $user->assignRole([$role->id]);

            $unit_id=Units::where('id',$request->unit_id)->update(['status'=>'rented']);

            //sendNotify
       //     Notification::send($user, new \App\Notifications\NewTenantNotify($user,$pass));
       $us=User::latest()->first();
            Tenant::create([
                //one to one
                'user_id'=>$us->id,
                //one to one
                'unit_id'=>$request->unit_id,
            /*
                'tn_name'=>$request->tn_name,
                'tn_nationality'=>$request->tn_nationality,
                'tn_ID_type'=>$request->tn_ID_type,
                'tn_ID_num'=>$request->tn_ID_num,
                'tn_phone'=>$request->tn_phone,
                'tn_telephone'=>$request->tn_telephone,
                'tn_email'=>$request->tn_email,
             */
            ]);
           // return $request->realty_id;
            $realty=Realty::where('id',$request->realty_id)->first();
            $realty->update([
                'rents'=>$realty->rents+=1,
            ]);
    if($unit->type=="محل تجاري")
    {


            $financaila=Financial_statements::create([
                'payment_cycle'=>'monthly',//$request->payment_cycle,
                'recurring_rent_payment'=>$request->recurring_rent_payment,
              //  'last_rent_payment'=>'0',
                'num_rental_payments'=>$request->num_rental_payments,
                'payment_channels'=>$request->payment_channels,
                'tax'=>$request->tax,
                'tax_ammount'=>$request->tax_ammount,
                'notes'=>$request->notes,
                'ejar_cost'=>$request->ejar_cost,
                'rent_value'=>$request->rent_value,
            ]);
          //  return 'tete';


        // /   $input['desc']=$request->files;
            Commitments::create(['desc'=>$request->desc]);
           $commit=Commitments::latest()->first();
            $fin=Financial_statements::latest()->first();
            $ten=Tenant::latest()->first();
            $image_name='doc-'.time().'.'.$request->docFile->extension();
            $request->docFile->storeAs('public/Documents',$image_name);
            Lease::create([
                'realty_id'=>$request->realty_id,
                //payments one to many
                'reco_number'=>$request->reco_number,
                'le_date'=>$request->le_date,
                'st_rental_date'=>$request->st_rental_date,
                'type'=>'new',//$request->type_le,
                'place'=>$request->place,
                'end_rental_date'=>$request->end_rental_date,
                'commitment_id'=>$commit->id, //one to one
                'financial_id'=>$fin->id,  //one to one
                'tenant_id'=>$ten->id, //many to one
                'unit_id'=>$request->unit_id,   //many to one
                'docFile'=>$image_name,
                'lease_type'=>"تجاري",

            ]);
        }
        else
        {

            $financaila=Financial_statements::create([










                'payment_cycle'=>'monthly',//$request->payment_cycle,
                'recurring_rent_payment'=>$request->recurring_rent_payment,

                'num_rental_payments'=>$request->num_rental_payments,
                'payment_channels'=>$request->payment_channels,

                'notes'=>$request->notes,
                'ejar_cost'=>$request->ejar_cost,
                'rent_value'=>$request->ejar_cost,
            ]);
          //  return 'tete';


        // /   $input['desc']=$request->files;
            Commitments::create(['desc'=>$request->desc]);
           $commit=Commitments::latest()->first();
            $fin=Financial_statements::latest()->first();
            $ten=Tenant::latest()->first();
            $image_name='doc-'.time().'.'.$request->docFile->extension();
            $request->docFile->storeAs('public/Documents',$image_name);
            Lease::create([
                'realty_id'=>$request->realty_id,
                //payments one to many
                'reco_number'=>$request->reco_number,
                'le_date'=>$request->le_date,
                'st_rental_date'=>$request->st_rental_date,
                'type'=>'new',//$request->type_le,
                'place'=>$request->place,
                'end_rental_date'=>$request->end_rental_date,
                'commitment_id'=>$commit->id, //one to one
                'financial_id'=>$fin->id,  //one to one
                'tenant_id'=>$ten->id, //many to one
                'unit_id'=>$request->unit_id,   //many to one
                'docFile'=>$image_name,
                'lease_type'=>"سكني",

            ]);
        }
            $les=Lease::latest()->first();
            foreach($request->release_date as $key=>$items )
            {
                $input['lease_id']=$les->id;
                $input['release_date']=$request->release_date[$key];
                $input['due_date']=$request->due_date[$key];
                $input['total']=$request->total[$key];
                $input['remain']=$request->total[$key];
                Payments::create($input);
            }
            $financaila->update(['num_rental_payments'=>Payments::where('lease_id',$les->id)->count(),]);
            return redirect()->route('effictive')->with([
                'message' => 'Realty edited successfully',
                'alert-type' => 'success',
            ]);
            /*
            when add owner or unit
            Owner_deeds::([
                //'lease_id'=>$request->lease_id,
                'instrument_num'=>$request->instrument_num,
                'issuer'=>$request->issuer,
                'date'=>$request->date,
                'place'=>$request->place,
            ]);
            */
            //toastr()->success(trans('messages.success'));
     }
     public function move_le_archive($id)
     {
        $lease=Lease::where('id',$id)->first();
        $lease->update(['status'=>'expired']);

        return redirect()->route('effictive')->with([
            'message' => 'Realty edited successfully',
            'alert-type' => 'success',
        ]);
        return redirect()->route('finished')->with([
            'message' => 'lease archive successfully',
            'alert-type' => 'success',
        ]);


     }
     public function destroy($id)
     {

     }
     public function fetchownerdata(Request $request)
     {
        if($request->get('valuedata'))
        {
            $valuedata=$request->get('valuedata');
            $result_data= User::where('id',$valuedata)->with('organization',function($query)
            {

                $query()->select('record_date','company_name');
            })->select('ID_type','email','phone','nationality','ID_num','telephone');
            return response()->json($result_data);

        }
     }
     public function fetchrealtydata(Request $request)
     {
        if($request->get('valuedata'))
        {
            $valuedata=$request->get('valuedata');
            $result_data= Realty::where('id',$valuedata)->first(); //owner_name
            return response()->json($result_data);
        }
     }
     public function fetchunitdata(Request $request)
     {

        if($request->get('valuedata'))
        {
            $valuedata=$request->get('valuedata');
            $result_data= Unit::where('id',$valuedata)->first();
            return response()->json($result_data);

        }
     }
      public function downFile($id)
    {
        $file_name=Lease::select('docFile')->where('id',$id)->latest()->paginate(5);
        foreach($file_name as $file)
        {
            $path=public_path().'/storage/Documents/'.$file->docFile;
        }
         return Response::download($path);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Tenant_envoie;
use App\Models\Financial_statements;
use App\Models\Owner_deeds;
use App\Models\Payments;
use App\Models\Commitments;
use App\Models\Leases;
class LeasesController extends Controller
{

    //reco_number - le_date - st_rental_date - payment_method - type - place - end_rental_date - org_id - org_envoice_id - tenant_id - tenant_envoice_id - broker_id
    //realty_id - unit_id - owner_deeds_id - financial_id - payments_id - commitments

    public function index()
    {
        $leases=Leases::select()->get();
        return view('Admin.Leases.index',compact('leases'));
    }
    public function show($id)
    {
        $lease = Leases::with()->get();
        return view('Admin.Leases.show',compact('lease'));
    }
     public function create()
     {
        $org=organization::all();
        $env=org_envoices::all();
        $broker=Broker::first();
        return view('Admin.Leases.create');
     }
     public function store(Request $request)
     {
        try {



            Tenant::create([
                'unit_id'=>$request->unit_id,
                't_name'=>$request->t_name,
                't_nationality'=>$request->t_nationality,
                't_date_birth'=>$request->t_date_birth,
                't_ID_type'=>$request->t_ID_type,
                't_ID_num'=>$request->t_ID_num,
                't_phone'=>$request->t_phone,
                't_email'=>$request->t_email,
            ]);
            Tenant_envoie::create([
                'tenant_id'=>$request->unit_id,
                'tn_name'=>$request->t_name,
                'tn_nationality'=>$request->t_nationality,
                'tn_date_birth'=>$request->t_date_birth,
                'tn_ID_type'=>$request->t_ID_type,
                'tn_ID_num'=>$request->t_ID_num,
                'tn_phone'=>$request->t_phone,
                'tn_email'=>$request->t_email,
            ]);
            Financial_statements::create([
                 //lease_id
                'prusit_amount'=>$request->prusit_amount,
                'annual_gas'=>$request->annual_gas,
                'annual_electricity'=>$request->annual_electricity,
                'annual_water'=>$request->annual_water,
                'annual_parking'=>$request->annual_parking,
                'annual_rent'=>$request->annual_rent,
                'num_parking'=>$request->num_parking,
                'payment_cycle'=>$request->payment_cycle,
                'recurring_rent_payment'=>$request->recurring_rent_payment,
                'last_rent_payment'=>$request->last_rent_payment,
                'num_rental_payments'=>$request->num_rental_payments,
                'Total'=>$request->Total,
                'payment_channels'=>$request->payment_channels,
                'deposit_amount'=>$request->deposit_amount,
                'violation_amount'=>$request->violation_amount,
            ]);
            Owner_deeds::create([
                //'lease_id'=>$request->lease_id,
                'instrument_num'=>$request->instrument_num,
                'issuer'=>$request->issuer,
                'date'=>$request->date,
                'place'=>$request->place,
            ]);
            Payments::create([
               // lease_id
               'serial_number'=>$request->serial_number,
               'release_date'=>$request->release_date,
               'due_date'=>$request->due_date,
               'total'=>$request->total,
            ]);
            Commitments::create([
                'desc'=>$request->desc,
            ]);
            Leases::create([
                    'reco_number'=> $request->reco_number,
                    'le_date'=> $request->le_date,
                    'st_rental_date'=> $request->st_rental_date,
                    'payment_method'=> $request->payment_method,
                    'type'=> $request->type,
                    'place'=> $request->place,
                    'end_rental_date'=> $request->end_rental_date,
                    'tenant_id'=>Tenant::last()->get('id'),
                    'tenant_envoice_id'=> Tenant_envoie::last()->get('id'),
                  //  'broker_id'=> $request->broker_id,
                    'unit_id'=> $request->unit_id,
                    'realty_id'=> $request->realty_id,
                    'org_id'=> $request->org_id,
                    'org_envoice_id'=> $request->org_envoice_id,
                    'financial_id'=> Financial_statements::last()->get('id'),
                    'owner_deeds_id'=> Owner_deeds::last()->get('id'),
                    'payments_id'=> Payments::last()->get('id'),
                    'commitments'=> Commitments::last()->get('id'),
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


     }
     public function update()
     {

    }
     public function destroy($id)
     {
     }
}

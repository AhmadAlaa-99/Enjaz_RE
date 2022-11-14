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

    public function my_lease()
    {
        $lease=Leases::select()->latest()->paginate(5);
        return view('Leases.myLease',compact('lease'));
    }
}

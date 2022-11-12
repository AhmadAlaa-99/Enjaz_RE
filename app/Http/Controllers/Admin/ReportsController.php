<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Units;
use App\Models\Payments;
use App\Models\Maintenance;


class ReportsController extends Controller
{
    public function contract_payments()
    {
          return view('Admin.Reports.contract_payments');
    }

    public function maintenance_payments()
    {
         $payments=Maintenance::with('units')->get();
         return view('Admin.Reports.maintenance_payments',compact('payments'));
    }






    public function rental_traffic()
    {
        return view('Admin.Reports.rental_traffic');
    }
    public function details($id)
    {
        return view('Admin.Reports.details');
    }
    public function payments_details($id)
    {

       $payments= Payments::where('lease_id',$id)->get();
       return view('Admin.Reports.payments_details',compact('payments'));

    }

    public function lease_details()
    {
        return view('Admin.leases_details');

    }
    public function maintenance_details()
    {
        return view('Admin.maintenance_details');

    }

}

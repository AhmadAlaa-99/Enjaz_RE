<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Units;
use App\Models\Realty;
use App\Models\Lease;
use App\Models\Payments;
use App\Models\Maintenance;
use DB;


class ReportsController extends Controller
{
    public function contract_payments()
    {
          return view('Admin.Reports.contract_payments');
    }

    public function maintenance_payments()
    {
         $payments=Maintenance::where('status','completed')->with('units')->latest()->paginate(5);
         return view('Admin.Reports.maintenance_payments',compact('payments'));
    }

    public function receivables()
    {
        $query=DB::table('payments')->join('leases','payments.lease_id','leases.id')->paginate('5');
         $all_receivables=0;

        foreach($query as $rec)
        {
              $all_receivables+=$rec->remain;
        }

        return view('Admin.System.receivables')->with([
            'receivables'=>$query,
            'all_receivables'=>$all_receivables,
        ]);
    }

    public function receivables_date(Request $request)
    {

        $fromDate=$request->input('fromDate');
        $toDate=$request->input('toDate');
        $type=$request->input('type');
        if($type=="part")
        {
        $query=DB::table('payments')->join('leases','payments.lease_id','leases.id')->select()
        ->where('release_date','>=',$fromDate)
        ->where('release_date','<=',$toDate)
        ->where('paid','==','0')->paginate('5');;
        }
        else if($type="total")
        {
        $query=DB::table('payments')->join('leases','payments.lease_id','leases.id')->select()
        ->where('release_date','>=',$fromDate)
        ->where('release_date','<=',$toDate)
        ->where('remain','!=','0')->paginate('5');;
        }
        else
        {
        $query=DB::table('payments')->join('leases','payments.lease_id','leases.id')->select()
        ->where('release_date','>=',$fromDate)
        ->where('release_date','<=',$toDate)->paginate('5');;
        }
        $all_receivables=0;

        foreach($query as $rec)
        {
              $all_receivables+=$rec->remain;
        }
        return view('Admin.System.receivables')->with([
              'receivables'=>$query,
            'all_receivables'=>$all_receivables,

        ]);

    }

    public function proceeds()
    {
        $query=DB::table('payments')->join('leases','payments.lease_id','leases.id')->paginate('5');
         $all_procced=0;

        foreach($query as $proc)
        {
              $all_procced+=$proc->paid;
        }

        return view('Admin.System.imports')->with([
            'proceeds'=>$query,
            'all_procced'=>$all_procced,
        ]);
    }

    public function proceeds_date(Request $request)
    {

        $fromDate=$request->input('fromDate');
        $toDate=$request->input('toDate');
        $type=$request->input('type');
        if($type=="part")
        {
        $query=DB::table('payments')->join('leases','payments.lease_id','leases.id')->select()
        ->where('release_date','>=',$fromDate)
        ->where('release_date','<=',$toDate)
        ->where('remain','!=','0')->paginate('5');;
        }
        else if($type="total")
        {
        $query=DB::table('payments')->join('leases','payments.lease_id','leases.id')->select()
        ->where('release_date','>=',$fromDate)
        ->where('release_date','<=',$toDate)
        ->where('remain','==','0')->paginate('5');;
        }
        else
        {
        $query=DB::table('payments')->join('leases','payments.lease_id','leases.id')->select()
        ->where('release_date','>=',$fromDate)
        ->where('release_date','<=',$toDate)->paginate('5');;
        }
        $all_procced=0;

        foreach($query as $proc)
        {
              $all_procced+=$proc->paid;
        }
        return view('Admin.System.imports')->with([
             'proceeds'=>$query,
            'all_procced'=>$all_procced,

        ]);

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

       $payments= Payments::where('lease_id',$id)->latest()->paginate(5);
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

    public function realties_proceeds()
    {
        $realties=Realty::all();
        return view('Admin.Reports.realties_proceeds',compact('realties'));

    }

}

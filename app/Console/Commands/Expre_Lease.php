<?php

namespace App\Console\Commands;
use App\Models\Lease;
use App\Models\Payments;
use Carbon\Carbon;
use Illuminate\Console\Command;

class Expre_Lease extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lease:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test leases expire every day in 12 am';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $leases=Lease::where('status','active')->get();
        foreach($leases as $lease)
        {
            $payments=Payments::where('lease_id',$lease->id)->get();
            foreach($payments as $payment)
            {
               $now=Carbon::now();
               $date=$payment->release_date;
               if($date>=$now)
            {
                $next_payment=$payment->release_date;
                $lease->update(['next_payment'=>$next_payment]);
                break;
            }
            continue;
           }

            }
        }
    }

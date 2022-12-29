<?php

namespace App\Console\Commands;
use App\Models\Lease;
use App\Models\Payments;
use Carbon\Carbon;
use App\Models\contract;
use App\Models\ensollments;
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
        //تاريخ اصدار القسط القادم في عقد الايجار
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
            //تاريخ اصدار القسط القادم في عقد الاستئجار
            $contracts=contract::where('status','active')->get();
            foreach($contracts as $contract)
            {
                 $enso= ensollments::where('contract_id',$contract->id)->orderBy('installment_date', 'ASC')->get();

                 foreach($enso as $ens)
           {

            $ins=$ens->installment_date;
            if($ins>=Carbon::now())
            {
                $next_payment=$ens->installment_date;
                $contract->update(['next_payment'=>$next_payment,]);
                break;
            }
            continue;

            }
           }

            //اشعار للادمن تخبره بصدور قسط استئجار
            $ensoll=DB::table('rent_ensollments')->join('contracts','contracts.id','rent_ensollments.contract_id')->get();
              foreach($ensoll as $ensol)
              {
                $date=Carbon::now();
                if($date=$ensil->installment_date)
                {
                    $user=User::where('role_name','Admin')->first();
                    $user->notify(new releseContractPayment($user,$ensol));
                }
              }
            //اشعار للادمن تخبره بانتهاء عقد الاستئجار
            foreach($contracts as $contract)
            {
               if(Carbon::now()==$contract->end_date)
               {
                $user=User::where('role_name','Admin')->first();
                $user->notify(new endContract($user,$ensol));

               }
            }
            //اشعار للمستأجر والادمن تخبره بانتهاء عقد الايجار
           foreach($leases as $lease)
           {
              if(Carbon::now()==$lease->end_rental_date)
               {
                $user=User::where('role_name','Admin')->first();
                $tenant=User::where('id',$lease->tenant_id)->first();
                $user->notify(new endleaseAdmin($user,$ensol));
                $tenan->notify(new endleaseTenant($user,$ensol));

               }
           }

            //اشعار للمستأجر تخبره بصدور فاتورة دفع

              foreach($leases as $lease)
           {
               $payments=Payments::where('lease_id',$lease->id)->get();
            foreach($payments as $payment)
            {
               $now=Carbon::now();
               $date=$payment->release_date;
               if($date==$now)
            {
                $user=User::where('role_name','Admin')->first();
                $tenant=User::where('id',$lease->tenant_id)->first();
                $user->notify(new paymentAdmin($user,$ensol));
                $tenan->notify(new paymentTenant($user,$ensol));

            }

           }
           }

        }
    }

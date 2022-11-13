<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant;
use App\Models\Tenant_envoie;
use App\Models\Financial_statements;
use App\Models\Owner_deeds;
use App\Models\Payments;
use App\Models\Commitments;
use App\Models\Lease;
use App\Models\User;
use App\Models\Realty;
use App\Models\Units;
use App\Models\organization;
use Spatie\Permission\Models\Role;


class testSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $realty= Realty::create([
            'realty_name'=> 'fsdfsd',
            'address'=> 'fdsfds',
            'type'=> 'villa',
            'use'=> 'family',
            'roles'=> '3',
            'units'=> '3',
            'size'=>'322',
            'owner_id'=> '1',
            'advantages'=> 'ewqdwq',
            ]);
            Units::create([
                'realty_id'=> '1',
                'type'=> 'villa',
                'role_number'=> '1',
                'number'=> '4',
                'size'=> '43',
                'furnished_mode'=> 'unfurnished',
                'kitchen_Cabinets'=> 'yes',
                'condition_units'=> '3',
                'condition_type'=> 'da',
                'water_number'=> '2',
                'Elecrtricity_number'=>'432',
                'details'=>'432',
                'bathrooms'=>'432',
                //'status'=>$request->status,
                //start_date
                //end_date
                //name_tenant
            ]);

           $user= User::create([
               'name'=>'ali',
               'nationality'=>'syrian',
               'ID_type'=>'wrw',
               'ID_num'=>'4433',
               'phone'=>'04324334',
               'telephone'=>'4543',
               'email'=>'tn@gmail.com',
               'role_name'=>'Tenant',
               'password'=>bcrypt(12345678),
            ]);
            $role=Role::where('name','Tenant')->first();
            $user->assignRole([$role->id]);


            Tenant::create([
                'user_id'=>'3',
                'unit_id'=>'1',

            ]);

            Financial_statements::create([
                'st_rental_date'=>'2020/10/10',
                'annual_rent'=>'424343',
                'payment_cycle'=>'monthly',
                'recurring_rent_payment'=>'424',

                'num_rental_payments'=>'34',
                'end_rental_date'=>'2020/10/10',
                'Total'=>'434',
                'payment_channels'=>'cash',
            ]);
          //  return 'tete';


        // /   $input['desc']=$request->files;
            Commitments::create(['desc'=>'التزام بتسليم العقار في الوقت المحدد']);
            Lease::create([
                'realty_id'=>'1',
                //payments one to many
                'reco_number'=>'543-GH',
                'le_date'=>'2020/10/10',
                'st_rental_date'=>'2020/10/10',
                'payment_method'=>'cash'
                ,
                'type'=>'new',//$request->type_le,
                'place'=>'saudia',
                'end_rental_date'=>'2020/10/10',
                'org_id'=>'1',
                'commitment_id'=>'1', //one to one
                'financial_id'=>'1',  //one to one
                'tenant_id'=>'1', //many to one
                'unit_id'=>'1',   //many to one
            ]);

            Payments::create([
                 'lease_id'=>'1',
                'release_date'=>'2020/10/10',
                'due_date'=>'2020/10/10',
                'total'=>'432432',
                'remain'=>'432432',
            ]);
             Payments::create([
                 'lease_id'=>'1',
                'release_date'=>'2020/10/10',
                'due_date'=>'2020/10/10',
                'total'=>'432432',
                'remain'=>'432432',
            ]);
             Payments::create([
                 'lease_id'=>'1',
                'release_date'=>'2020/10/10',
                'due_date'=>'2020/10/10',
                'total'=>'432432',
                'remain'=>'432432',
            ]);
             Payments::create([
                 'lease_id'=>'1',
                'release_date'=>'2020/10/10',
                'due_date'=>'2020/10/10',
                'total'=>'432432',
                'remain'=>'432432',
            ]);
            Units::where('id','1')->update(['status'=>'rented']);








    }
}

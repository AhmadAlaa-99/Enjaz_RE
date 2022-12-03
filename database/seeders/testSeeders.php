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
use Carbon\Carbon;
use App\Models\contract;
use App\Models\ensollments;
use App\Models\Owner;
use Faker\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
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
         Owner::create([
        'name'=>'Ahmad Alaa',
        'email'=>'Ahmad@gmail.com',
        'mobile'=>'9664324324',
        'attribute_name'=>'aliAli',
       ]);
       $owner=Owner::latest()->first();
        Realty::create([
                'realty_name'=>'عمارة الشفاء',
                'owner_id'=>$owner->id,
                'address'=>'السعودية - جدة',
                'type'=>'building',
                'use'=>'family',
                'roles'=>'1',
                'units'=> '3',
                'size'=> '43',
                'advantages'=> 'not found',
                ]);
                $realty=Realty::latest()->first();
                $image_name='doc-gf.jpg';
                contract::create([
                'realty_id'=>$realty->id,
                'contactNo'=>'435',
                'start_date'=>'10/10/2020',
                'end_date'=>'10/10/2022',
                'rent_value'=>'100000',
                'contract_file'=>$image_name,
                'type'=>'تجاري',
                'note'=>'not found',
                'status'=>'عقد جاري',
            ]);
            $contract=contract::latest()->first();
            ensollments::create([
                'contract_id'=>$contract->id,
                'installmentNo'=>'42423',
                 'installment_date'=>'11/11/2020',
                 'payment_date'=>'11/11/2020',
                   'amount'=>'3243',
                   'payment_type'=>'cash',
                   'refrenceNo'=>'3424',
                    'note'=>'not found',
            ]);
            $faker = Factory::create();
/*

        $realty_type=['villa','building'];
        $realty_use=['family','individually'];

for ($i = 0; $i <5; $i++)

{
        $realty= Realty::create([

            'realty_name'=>$faker->sentence(mt_rand(1,2), true),
            'address'=>'saudia',
            'type'=> Arr::random($realty_type),
            'use'=> Arr::random($realty_use),
            'roles'=>'2',
            'units'=>'3',
            'size'=>'500',
            'advantages'=> 'يمتلك مصعد و حديقة عامة',
            ]);
        }
*/
        $unit_type=['villa','apartment','two-floor','small','annexe'];
        $furnished=['unfurnished', 'newfn','usedfn'];
        $kitshen=['yes','no'];
        for ($i = 0; $i <2; $i++)
            Units::create([
                'realty_id'=>'1',
                'type'=>Arr::random($unit_type),
                'role_number'=>rand(1,2),
                'number'=>$faker->numerify('kh-###'),
                'size'=>'80',
                'furnished_mode'=>Arr::random($furnished),
                'kitchen_Cabinets'=>Arr::random($kitshen),
                'condition_units'=> '2',
                'condition_type'=> 'شباك',
                'rooms'=>'3',
                'details'=>'not found',
                'bathrooms'=>'2',
                //'status'=>$request->status,
                //start_date
                //end_date
                //name_tenant
            ]);

$name = $faker->sentence(mt_rand(3, 6), true);
$id_type=['civilian','stay'];
$gender=['male','female'];

for ($i = 0; $i <2; $i++)
{
 $user= User::create([
    'name'=>$faker->sentence(mt_rand(1,2), true),
    'nationalitie_id'=>rand(1,10),
    'ID_type'=>Arr::random($id_type),
    'ID_num'=>$faker->numerify('##########'),
    'phone'=>$faker->numerify('9669########'),
     'gender'=>Arr::random($gender),
    'telephone'=>$faker->numerify('########'),
    'email'=>$faker->email,
    'role_name'=>'Tenant',
    'password'=>bcrypt('21412123'),
]);
            $role=Role::where('name','Tenant')->first();
            $user->assignRole([$role->id]);
            Tenant::create([
                'user_id'=>$user->id,
                'unit_id'=>rand(1,2),

            ]);
        }


            Financial_statements::create([
                'st_rental_date'=>Carbon::now(),
                'annual_rent'=>'50000',
                'payment_cycle'=>'midterm',
                'recurring_rent_payment'=>'25000',
                'num_rental_payments'=>'2',
                'end_rental_date'=>Carbon::now()->addYear(),
                'Total'=>'50000',
                'payment_channels'=>'cash',
            ]);
            Commitments::create(['desc'=>'التزام بتسليم العقار في الوقت المحدد']);

          $tenant=Tenant::where('id',1)->first();
            $unit=Units::where('id',$tenant->unit_id)->first();
            $realty=Realty::where('id',$unit->realty_id)->first();
             $realty->update([
                'rents'=>$realty->rents+=1,
            ]);
            Lease::create([
                'realty_id'=>'1',
                //payments one to many
                'reco_number'=>'543-GH',
                'le_date'=>Carbon::now(),
                'st_rental_date'=>Carbon::now(),
                'payment_method'=>'cash',
                'type'=>'new',
                'place'=>'saudia',
                'end_rental_date'=>Carbon::now()->addYear(),
                'commitment_id'=>'1', //one to one
                'financial_id'=>'1',  //one to one
                'tenant_id'=>'1', //many to one
                'unit_id'=>'1',   //many to one
                'docFile'=>'doc-34545.jpg',
            ]);
            Payments::create([
                 'lease_id'=>'1',
                'release_date'=>Carbon::now()->addMonths(6),
                'due_date'=>Carbon::now()->addMonths(6),
                'total'=>'25000',
                'remain'=>'25000',
            ]);
             Payments::create([
                 'lease_id'=>'1',
                'release_date'=>Carbon::now()->addYear(),
                'due_date'=>Carbon::now()->addYear(),
                'total'=>'25000',
                'remain'=>'25000',
            ]);
            Units::where('id','1')->update(['status'=>'rented']);











             Financial_statements::create([
                'st_rental_date'=>Carbon::now(),
                'annual_rent'=>'48000',
                'payment_cycle'=>'quarterly',
                'recurring_rent_payment'=>'12000',
                'num_rental_payments'=>'2',
                'end_rental_date'=>Carbon::now()->addMonths(6),
                'Total'=>'24000',
                'payment_channels'=>'cash',
            ]);
            Commitments::create(['desc'=>'التزام بتسليم العقار في الوقت المحدد']);
            $tenant=Tenant::where('id',2)->first();
            $unit=Units::where('id',$tenant->unit_id)->first();
            $realty=Realty::where('id',$unit->realty_id)->first();
             $realty->update([
                'rents'=>$realty->rents+=1,
            ]);
            Lease::create([
                'realty_id'=>'1',
                //payments one to many
                'reco_number'=>'543-GH',
                'le_date'=>Carbon::now(),
                'st_rental_date'=>Carbon::now(),
                'payment_method'=>'cash',
                'type'=>'new',
                'place'=>'saudia',
                'end_rental_date'=>Carbon::now()->addMonths(6),
                'commitment_id'=>'2', //one to one
                'financial_id'=>'2',  //one to one
                'tenant_id'=>'2', //many to one
                'unit_id'=>'2',   //many to one
                'docFile'=>'doc-34545.jpg',
            ]);
            Payments::create([
                 'lease_id'=>'2',
                'release_date'=>Carbon::now()->addMonths(3),
                'due_date'=>Carbon::now()->addMonths(3),
                'total'=>'12000',
                'remain'=>'12000',
            ]);
             Payments::create([
                 'lease_id'=>'2',
                'release_date'=>Carbon::now()->addMonths(6),
                'due_date'=>Carbon::now()->addMonths(6),
                'total'=>'12000',
                'remain'=>'12000',
            ]);
            Units::where('id','2')->update(['status'=>'rented']);















/*
             Financial_statements::create([
                'st_rental_date'=>Carbon::now(),
                'annual_rent'=>'60000',
                'payment_cycle'=>'monthly',
                'recurring_rent_payment'=>'5000',
                'num_rental_payments'=>'3',
                'end_rental_date'=>Carbon::now()->addMonths(3),
                'Total'=>'15000',
                'payment_channels'=>'cash',
            ]);
            Commitments::create(['desc'=>'التزام بتسليم العقار في الوقت المحدد']);
            $tenant=Tenant::where('id',3)->first();
            $unit=Units::where('id',$tenant->unit_id)->first();
            $realty=Realty::where('id',$unit->realty_id)->first();
             $realty->update([
                'rents'=>$realty->rents+=1,
            ]);

            Lease::create([
                'realty_id'=>'3',
                //payments one to many
                'reco_number'=>'543-GH',
                'le_date'=>Carbon::now(),
                'st_rental_date'=>Carbon::now(),
                'payment_method'=>'cash',
                'type'=>'new',
                'place'=>'saudia',
                'end_rental_date'=>Carbon::now()->addMonths(3),
                'commitment_id'=>'3', //one to one
                'financial_id'=>'3',  //one to one
                'tenant_id'=>'3', //many to one
                'unit_id'=>$unit->id,   //many to one
                'docFile'=>'doc-34545.jpg',
            ]);
            Payments::create([
                'lease_id'=>'3',
                'release_date'=>Carbon::now()->addMonths(1),
                'due_date'=>Carbon::now()->addMonths(1),
                'total'=>'5000',
                'remain'=>'5000',
            ]);
             Payments::create([
                 'lease_id'=>'3',
                'release_date'=>Carbon::now()->addMonths(2),
                'due_date'=>Carbon::now()->addMonths(2),
                'total'=>'5000',
                'remain'=>'5000',
            ]);
             Payments::create([
                 'lease_id'=>'3',
                'release_date'=>Carbon::now()->addMonths(3),
                'due_date'=>Carbon::now()->addMonths(3),
                'total'=>'5000',
                'remain'=>'5000',
            ]);
            Units::where('id',$unit->id)->update(['status'=>'rented']);


*/




        }









}

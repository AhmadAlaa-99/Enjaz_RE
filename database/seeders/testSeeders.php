<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Units;
use App\Models\Realty;


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



    }
}

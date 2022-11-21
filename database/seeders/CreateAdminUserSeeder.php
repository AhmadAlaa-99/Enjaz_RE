<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\organization;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
class CreateAdminUserSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
    $faker = Factory::create();

    $user = User::create([
        'name'=>'Ahmad Alaa',
        'nationalitie_id'=>'1',
        'ID_type'=>'gpt432',
        'ID_num'=>'14040024',
        'phone'=>'0937607234',
         'gender'=>'male',
        'telephone'=>'6554334',
        'email'=>'ahmad@gmail.com',
        'role_name'=>'Admin',
        'password'=>bcrypt('12345678'),
           ]);
$role = Role::create(['name' => 'Admin']);
 $role=Role::where('name','Admin')->first();
$role->syncPermissions(
    'الوسيط العقاري -  ملاك العقارات',
'الوسيط العقاري -  ادارة المستأجرين',
'طلبات الصيانة - الوسيط- المالك',
'الوسيط- المالك - مدفوعات الصيانة',
'ادارة العقارات - الوسيط',
'حركة التأجير - الوسيط العقاري',
'الاعدادات  - الوسيط',
' السجل المالي- الوسيط',
);
 $user->assignRole([$role->id]);
 ///////////////////////////////////////////////////////////////
$role = Role::create(['name' => 'Owner']);
$role=Role::where('name','Owner')->first();
$role->syncPermissions(
'ادارة المستأجرين - المالك',
'عقاراتي - المالك',
'حركة التأجير- المالك',
'الاعدادات المالك',);


$id_type=['civilian','stay'];
$gender=['male','female'];
for ($i = 0; $i < 3; $i++)
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
    'role_name'=>'Owner',
    'password'=>bcrypt('21412123'),
]);
organization::create([
    'email'=>$user->email,
    'company_name'=> $user->name,
    'record_date'=>$faker->date,
]);


$user->assignRole([$role->id]);
}


$role = Role::create(['name' => 'Tenant']);
$role->syncPermissions(
    'الاعدادات المستأجر',
    'الصيانة - المستأجر',);










}
}

<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\organization;

class CreateAdminUserSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{

    $user = User::create([
        'name'=>'Ahmad Alaa',
        'nationalitie_id'=>'1',
        'ID_type'=>'gpt432',
        'ID_num'=>'14040024',
        'phone'=>'0937607234',
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
);
 $user->assignRole([$role->id]);
 $user= User::create([
    'name'=>'fdsf',
    'nationalitie_id'=>'1',
    'ID_type'=>'ds',
    'ID_num'=>'fsd',
    'phone'=>'323',
    'telephone'=>'43243',
    'email'=>'ds@gmail.com',
    'role_name'=>'Owner',
    'password'=>bcrypt('21412123'),
]);
organization::create([
    'email'=>'ds@gmail.com',
    'company_name'=>'safsa',
    'record_date'=> '2020/10/10',
]);

$role = Role::create(['name' => 'Owner']);
$role=Role::where('name','Owner')->first();
$role->syncPermissions(
'ادارة المستأجرين - المالك',
'عقاراتي - المالك',
'حركة التأجير- المالك',
'الاعدادات المالك',);
$user->assignRole([$role->id]);



$role = Role::create(['name' => 'Tenant']);
$role->syncPermissions(
    'الاعدادات المستأجر',
    'الصيانة - المستأجر',);










}
}

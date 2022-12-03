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
use App\Models\Broker;
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
        'name'=>'Enjaz Company',
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
        Broker::create([
            'email'=>'ahmad@gmail.com',
            'date_founded'=>'2020/10/10',
            'about'=>'شركة انجاز المستقلة',
            'vision'=>'نتطلع ل مستقبل أفضل في العقارات',
            'mission'=>'معا أفضل',
        ]);
$role = Role::create(['name' => 'Admin']);
 $role=Role::where('name','Admin')->first();
 /*

*/
$role->syncPermissions(
'ادارة العقارات - الوسيط',
 'ادارة الاستئجار - الوسيط',

'الوسيط العقاري -  ادارة المستأجرين',

'طلبات الصيانة - الوسيط',

'حركة التأجير - الوسيط العقاري',

'الاعدادات  - الوسيط',

' السجل المالي- الوسيط',

);
 $user->assignRole([$role->id]);
 ///////////////////////////////////////////////////////////////


$role = Role::create(['name' => 'Tenant']);
$role->syncPermissions(
    ' المستأجر -   البيانات الايجارية',
'الصيانة - المستأجر',
'الاعدادات المستأجر',

);
}
}

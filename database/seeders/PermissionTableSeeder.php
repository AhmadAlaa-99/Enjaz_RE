<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
$permissions = [
        'ادارة العقارات - الوسيط',

    ' المستأجر -   البيانات الايجارية',
    'الوسيط العقاري -  ادارة المستأجرين',


    'طلبات الصيانة - الوسيط',
    'الصيانة - المستأجر',

    'حركة التأجير - الوسيط العقاري',

    'الاعدادات  - الوسيط',
    'الاعدادات المستأجر',
    ' السجل المالي- الوسيط',


 'ادارة الاستئجار - الوسيط'

];

foreach ($permissions as $permission) {
Permission::create(['name' => $permission]);
}}}

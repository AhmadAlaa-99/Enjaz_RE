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
    ' المستأجر -   البيانات الايجارية', 'الوسيط العقاري -  ملاك العقارات',
    'الوسيط العقاري -  ادارة المستأجرين',
    'ادارة المستأجرين - المالك',
    'طلبات الصيانة - الوسيط- المالك',
    'الوسيط- المالك - مدفوعات الصيانة',
    'الصيانة - المستأجر',
    'ادارة العقارات - الوسيط',
    'عقاراتي - المالك',
    'حركة التأجير - الوسيط العقاري',
    'حركة التأجير- المالك',
    'الاعدادات  - الوسيط',
    'الاعدادات المالك',
    'الاعدادات المستأجر',
    ' السجل المالي- الوسيط',



];

foreach ($permissions as $permission) {
Permission::create(['name' => $permission]);
}}}

/*
 ' المستأجر -   البيانات الايجارية',
    'الوسيط العقاري -  ملاك العقارات',
    'الوسيط العقاري -  ادارة المستأجرين',
    'ادارة المستأجرين - المالك',
    'طلبات الصيانة - الوسيط- المالك',
    'الوسيط- المالك - مدفوعات الصيانة',
    'الصيانة - المستأجر',
    'ادارة العقارات - الوسيط',
    'عقاراتي - المالك',
    'حركة التأجير - الوسيط العقاري',
    'حركة التأجير- المالك',
    'ادارة الصلاحيات - الوسيط ',
    'ادارة المستخدمين - الوسيط',

    */

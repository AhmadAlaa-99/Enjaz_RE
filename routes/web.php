<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TenantsController as AdminTenantController;
use App\Http\Controllers\Admin\MainTenancesController as AdminMainTenancesController;
use App\Http\Controllers\Admin\ReportsController as ReportsController;
use App\Http\Controllers\Admin\SettingsController as SettingsController;
use App\Http\Controllers\Admin\LeasesController as AdminLeasesController;
use App\Http\Controllers\Admin\UnitsController as AdminUnitsController;
use App\Http\Controllers\Admin\OwnersController as AdminOwnersController;
use App\Http\Controllers\Admin\RealtiesController as AdminRealtiesController;
use App\Http\Controllers\Tenant\MainTenancesController as TenantMainTenancesController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\receive_reports;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/storage', function () {
    Artisan::call('storage:link');
});
Route::get('/clear', function() {
	$exitCode = Artisan::call('cache:clear');
	$exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('route:clear');
	$exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:clear');
    return 'All routes cache has just been removed';
});
Route::get('/owner_autocomplete',[AdminLeasesController::class,'fetchownerdata']);
Route::get('/realty_autocomplete',[AdminLeasesController::class,'fetchrealtyrdata']);
Route::get('/unit_autocomplete',[AdminLeasesController::class,'fetchunitdata']);
Route::get('/getunits',[AdminUnitsController::class,'getunits']);
Route::get('/profile',[SettingsController::class,'profile'])->name('profile');

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/test', function () {
    return view('test');
});
 Auth::routes(['register' => false]);
   Route::get('/downFile/{id}',[AdminLeasesController::class, 'downFile'])->name('down.file');


//Admin

Route::group([
    'prefix'=>'Admin',
    //'middleware'=>'auth',
  ],function()

  {
     Route::get('/', [SettingsController::class,'statistics']);
     Route::resource('/owners',\Admin\OwnersController::class);
    Route::get('/owner_destroy/{id}',[AdminOwnersController::class,'destroy'])->name('owner.destroy');

     Route::get('/tenants',[AdminTenantController::class,'index']);
     Route::get('/accept_requests',[AdminMainTenancesController::class,'accept_requests']);
     Route::get('/wait_request',[AdminMainTenancesController::class,'wait_request'])->name('wait_request');
     Route::post('/maint_response/{id}',[AdminMainTenancesController::class,'maint_response'])->name('maint_response');
     Route::resource('/realties',\Admin\RealtiesController::class);

    Route::get('/realty_destroy/{id}',[AdminRealtiesController::class,'destroy'])->name('realty.destroy');
   Route::get('/printl', function () {
    return view('lease_print');
});
     Route::post('/units_add',[AdminUnitsController::class,'units_add'])->name('units_add');
     Route::get('/empty_units',[AdminUnitsController::class,'empty_units'])->name('empty_units');
     Route::get('/unit_destroy/{id}',[AdminUnitsController::class,'destroy'])->name('unit.destroy');
     Route::get('/rented_units',[AdminUnitsController::class,'rented_units'])->name('rented_units');
     Route::resource('/units',\Admin\UnitsController::class);

     Route::resource('/leases',\Admin\LeasesController::class);
     Route::get('/unit_rent/{id}',[AdminLeasesController::class,'create'])->name('unit.rent');


     Route::get('/effictive',[AdminLeasesController::class,'effictive'])->name('effictive');;
     Route::get('/finished',[AdminLeasesController::class,'finished'])->name('finished');;
     Route::get('/lease_details/{id}',[AdminLeasesController::class,'details'])->name('lease.details');
     Route::get('/lease_un.details/{id}',[AdminLeasesController::class,'lease_un_details'])->name('lease_un.details');


     Route::post('/payments_edit/{id}',[AdminLeasesController::class,'payments_edit'])->name('payment.edit');
     Route::get('/payment_details/{id}',[AdminLeasesController::class,'payment_details'])->name('payment.details');

     Route::get('/payments_details/{id}',[ReportsController::class,'payments_details'])->name('payments.details');



     Route::resource('/receives_reports',\Admin\receive_reports::class);
    Route::get('/receive_details/{id}',[receive_reports::class,'details'])->name('receive.details');
    Route::get('/receive_destroy/{id}',[receive_reports::class,'destroy'])->name('receive.destroy');
    

     Route::get('/maintenance_payments',[ReportsController::class,'maintenance_payments']);


     Route::get('/proceeds',[ReportsController::class,'proceeds'])->name('proceeds');
     Route::post('/proceeds_date',[ReportsController::class,'proceeds_date'])->name('proceeds_date');

     Route::get('/receivables',[ReportsController::class,'receivables'])->name('receivables');
     Route::post('/receivables_date',[ReportsController::class,'receivables_date'])->name('receivables_date');


     Route::get('/Account_settings',[SettingsController::class,'Account_settings']);
     Route::post('/Account_edit',[SettingsController::class,'Account_edit'])->name('Account_edit');

     Route::resource('/roles',\UserManagement\RoleController::class);
     Route::resource('/users',\UserManagement\UserController::class);
     Route::get('/statistics',[SettingsController::class,'statistics']);

     Route::get('/archive_leases',[AdminLeasesController::class,'archive'])->name('archive_leases');
     Route::get('/move_le_archive/{id}',[AdminLeasesController::class,'move_le_archive'])->name('move_le.archive');
     Route::get('/archive_tenants',[AdminTenantController::class,'archive'])->name('archive_tenants');
     Route::get('/archive_owners',[AdminOwnersController::class,'archive'])->name('archive_owners');


     Route::get('/realty_units_add/{id}',[AdminUnitsController::class,'realty_units_add'])->name('realty_units_add');
     Route::post('/realty_units_store/{id}',[AdminUnitsController::class,'realty_units_store'])->name('realty_units_store');
     Route::get('/realty_units_show/{id}',[AdminUnitsController::class,'realty_units_show'])->name('realty_units_show');
    Route::get('/settings',[SettingsController::class,'settings']);




   /*

     Route::get('/tn_payments',[AdminTenantController::class,'payments']);
     Route::get('/profile',[profileController::class,'Admin'])->name('Admin_profile');
     Route::get('/contract_payments',[ReportsController::class,'contract_payments']);
     Route::get('/rental_traffic',[ReportsController::class,'rental_traffic']);
     Route::get('/invoice_details',[ReportsController::class,'details']);
     Route::get('/maintenance_details',[ReportsController::class,'maintenance_details']);
     */

  });

  Route::group([
    'prefix'=>'Tenant',
  // 'middleware'=>'auth|privateAdmin',
  ],function()
  {


     Route::get('/leases',[TenantController::class,'leases']);
     Route::get('/request_form',[TenantController::class,'request_form']);
     Route::post('/request_send',[TenantController::class,'request_send'])->name('request_send');
     Route::get('/maints_requests',[TenantController::class,'maints_requests']);
     Route::get('/tn_lease.details/{id}',[TenantController::class,'tn_lease_details'])->name('tn_lease.details');

  });

  Route::group([
    'prefix'=>'Owner',
   //'middleware'=>'auth|privateAdmin',
  ],function()
  {
    Route::get('/actived_tenants',[OwnerController::class,'actived_tenants']);
    Route::get('/archive_tenants',[OwnerController::class,'archive_tenants']);


    Route::get('/realties',[OwnerController::class,'all_realties']);
    Route::get('/empty_units',[OwnerController::class,'empty_units']);
    Route::get('/rented_units',[OwnerController::class,'rented_units']);
        Route::get('/show_units/{id}',[OwnerController::class,'show_units'])->name('show_units_ow');


    Route::get('/expired_leases',[OwnerController::class,'expired_leases']);
    Route::get('/actived_leases',[OwnerController::class,'actived_leases']);
    Route::get('/details_lease/{id}',[OwnerController::class,'details_lease'])->name('ow_lease.details');
    Route::get('/statistics',[OwnerController::class,'statistics']);

  });

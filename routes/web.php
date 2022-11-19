<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/admin/lnxx', [App\Http\Controllers\Auth\AuthController::class, 'getLogin'])->name('admin');

Route::post('/admin/login', [App\Http\Controllers\Auth\AuthController::class, 'postLogin']);
Route::any('/admin/logout', [App\Http\Controllers\Auth\AuthController::class, 'adminLogout'])->name('logout-admin');


Route::group(['middleware' => 'auth', 'after' => 'no-cache'], function () {

    Route::prefix('admin')->group(function () {

        Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'App\Http\Controllers\DashboardController@index']);
      
               // Customer route start
            Route::resource('customer','App\Http\Controllers\CustomerController', [
                'names' => [
                    // 'index'     => 'customer.index',
                    'create'    => 'customer.create',
                    'store'     => 'customer.store',
                    'edit'      => 'customer.edit',
                    'update'    => 'customer.update',
                ],
                'except' => ['show','destroy']
            ]);
            Route::get('customer', 'App\Http\Controllers\CustomerController@index')->name('customer');

            Route::any('customer/paginate/{page?}', ['as' => 'customer.paginate',
                'uses' => 'App\Http\Controllers\CustomerController@customerPaginate']);
            Route::any('customer/paginate-data-entry/{page?}', ['as' => 'customer.paginate-data-entry',
                'uses' => 'App\Http\Controllers\CustomerController@customerPaginate_data_entry']);
            Route::any('customer/action', ['as' => 'customer.action',
                'uses' => 'App\Http\Controllers\CustomerController@customerAction']);
            Route::any('customer/toggle/{id?}', ['as' => 'customer.toggle',
                'uses' => 'App\Http\Controllers\CustomerController@customerToggle']);
            Route::any('customer/drop/{id?}', ['as' => 'customer.drop',
                'uses' => 'App\Http\Controllers\CustomerController@drop']);
            Route::any('customer/data-entry', 'App\Http\Controllers\CustomerController@customerdataentry')->name('customer.data-entry');
            Route::any('customer/action-data-entry', ['as' => 'customer-data-entry.action',
                'uses' => 'CustomerController@customerAction_data_entry']);
            Route::any('customer/export-users', 'CustomerController@export_users')->name('customer.export-users');
            Route::any('export-category', 'CustomerController@export_category')->name('export-category');
            Route::any('admin-users', 'CustomerController@admin_users')->name('admin_users');
            Route::any('export-order', 'CustomerController@export_order')->name('export-order');
            Route::any('customer-record', 'CustomerController@customerRecord')->name('customer-record');
            // Customer route end   
            Route::any('customer/upload-customer', 'CustomerController@upload_customer')->name('upload-customer');
            Route::any('customer/import', 'CustomerController@ImportCustomer')->name('customer.import');
      
            // Change Password Routes
            Route::any('myaccount', ['as' => 'setting.manage-account',
                'uses' => 'App\Http\Controllers\SettingController@myAccount']);
            // Change Password Routes

            // Service Master route start
            Route::resource('services', 'App\Http\Controllers\ServiceController', [
                'names' => [
                    'index'     => 'services.index',
                    'create'    => 'services.create',
                    'store'     => 'services.store',
                    'edit'      => 'services.edit',
                    'update'    => 'services.update',
                ],
                'except' => ['show','destroy']
            ]);

            Route::any('services/paginate/{page?}', ['as' => 'services.paginate',
                'uses' => 'App\Http\Controllers\ServiceController@servicesPaginate']);
            Route::any('services/action', ['as' => 'services.action',
                'uses' => 'App\Http\Controllers\ServiceController@servicesAction']);
            Route::any('services/toggle/{id?}', ['as' => 'services.toggle',
                'uses' => 'App\Http\Controllers\ServiceController@servicesToggle']);
            Route::any('services/drop/{id?}', ['as' => 'services.drop',
                'uses' => 'services@drop']);
            // Service


});

});


Route::any('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('get-started');
Route::any('home', [App\Http\Controllers\Frontend\HomeController::class, 'home'])->name('home');

Route::any('sign-up', [App\Http\Controllers\Frontend\HomeController::class, 'sign_up'])->name('sign_up');
Route::any('register-email', [App\Http\Controllers\Frontend\HomeController::class, 'email_register'])->name('register-email');
Route::any('email-otp', [App\Http\Controllers\Frontend\HomeController::class, 'email_otp'])->name('email-otp');
Route::any('enter-name', [App\Http\Controllers\Frontend\HomeController::class, 'enter_name'])->name('enter-name');
Route::any('user-register', [App\Http\Controllers\Frontend\HomeController::class, 'user_register'])->name('user-register');

Route::get('getState', [App\Http\Controllers\CategoryController::class, 'getState'])->name('getState');
Route::get('getCity', [App\Http\Controllers\CategoryController::class, 'getCity'])->name('getCity');
Route::get('otp-match', [App\Http\Controllers\Frontend\HomeController::class, 'otp_match'])->name('otp-match');
Route::get('email-otp-match', [App\Http\Controllers\Frontend\HomeController::class, 'email_otp_match'])->name('email-otp-match');
Route::get('login-otp-match', [App\Http\Controllers\Frontend\HomeController::class, 'login_otp_match'])->name('login-otp-match');

Route::any('sign-in', [App\Http\Controllers\Frontend\HomeController::class, 'sign_in'])->name('sign-in');
Route::any('enter-login-otp', [App\Http\Controllers\Frontend\HomeController::class, 'login_otp'])->name('enter-login-otp');
Route::any('log-in', [App\Http\Controllers\Frontend\HomeController::class, 'login'])->name('log-in');

Route::any('agent-menu', [App\Http\Controllers\Frontend\HomeController::class, 'agent_menu'])->name('agent-menu');
Route::any('customer-menu', [App\Http\Controllers\Frontend\HomeController::class, 'customer_menu'])->name('customer-menu');

Route::get('getSubcategory', [App\Http\Controllers\Frontend\HomeController::class, 'getSubcategory'])->name('getSubcategory');
Route::get('otp-sent', [App\Http\Controllers\Frontend\HomeController::class, 'otp_sent'])->name('otp-sent');
Route::get('email-check', [App\Http\Controllers\Frontend\HomeController::class, 'email_check'])->name('email-check');

Route::group(['middleware' => 'user-auth', 'after' => 'no-cache'], function () {

Route::any('log-out', [App\Http\Controllers\Frontend\HomeController::class, 'logout'])->name('user-logout');
Route::any('my-profile', [App\Http\Controllers\Frontend\HomeController::class, 'profileShow'])->name('my-profile');
Route::any('dashboard', [App\Http\Controllers\Frontend\HomeController::class, 'dashboard'])->name('user-dashboard');
Route::any('personal-details', [App\Http\Controllers\Frontend\HomeController::class, 'personal_details'])->name('personal-details');
Route::any('profile-update', [App\Http\Controllers\Frontend\HomeController::class, 'update_profile'])->name('profile-update');
Route::any('cm-details', [App\Http\Controllers\Frontend\HomeController::class, 'cm_details'])->name('cm-details');
Route::any('education-detail', [App\Http\Controllers\Frontend\HomeController::class, 'education_detail'])->name('education-detail');
Route::any('address-details', [App\Http\Controllers\Frontend\HomeController::class, 'address_details'])->name('address-details');
Route::any('select-services', [App\Http\Controllers\Frontend\HomeController::class, 'select_services'])->name('select-services');

Route::any('thank-you', [App\Http\Controllers\Frontend\HomeController::class, 'ServiceApply'])->name('thank-you');

Route::any('upload-emirates-id', [App\Http\Controllers\Frontend\HomeController::class, 'upload_emirates'])->name('upload-emirates-id');
Route::any('upload-profile-image', [App\Http\Controllers\Frontend\HomeController::class, 'upload_profile_image'])->name('upload-profile-image');

Route::any('save-profile-image', [App\Http\Controllers\Frontend\HomeController::class, 'save_profile_image'])->name('save-profile-image');



});


Route::get('reset', function (){
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
});




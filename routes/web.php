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
Route::any('/admin/logout', [App\Http\Controllers\Auth\AuthController::class, 'adminLogout'])->name('logout');


Route::group(['middleware' => 'auth', 'after' => 'no-cache'], function () {

    Route::prefix('admin')->group(function () {

        Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'App\Http\Controllers\DashboardController@index']);
      
               // Customer route start
            Route::resource('customer','CustomerController', [
                'names' => [
                    // 'index'     => 'customer.index',
                    'create'    => 'customer.create',
                    'store'     => 'customer.store',
                    'edit'      => 'customer.edit',
                    'update'    => 'customer.update',
                ],
                'except' => ['show','destroy']
            ]);
            Route::get('customer', 'CustomerController@index')->name('customer');

            Route::any('customer/paginate/{page?}', ['as' => 'customer.paginate',
                'uses' => 'CustomerController@customerPaginate']);
            Route::any('customer/paginate-data-entry/{page?}', ['as' => 'customer.paginate-data-entry',
                'uses' => 'CustomerController@customerPaginate_data_entry']);
            Route::any('customer/action', ['as' => 'customer.action',
                'uses' => 'CustomerController@customerAction']);
            Route::any('customer/toggle/{id?}', ['as' => 'customer.toggle',
                'uses' => 'CustomerController@customerToggle']);
            Route::any('customer/drop/{id?}', ['as' => 'customer.drop',
                'uses' => 'CustomerController@drop']);
            Route::any('customer/data-entry', 'CustomerController@customerdataentry')->name('customer.data-entry');
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
                'uses' => 'SettingController@myAccount']);
            // Change Password Routes


});

});


Route::any('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('get-started');
Route::any('home', [App\Http\Controllers\Frontend\HomeController::class, 'home'])->name('home');

Route::any('sign-up', [App\Http\Controllers\Frontend\HomeController::class, 'sign_up'])->name('sign-up');


Route::get('getState', [App\Http\Controllers\CategoryController::class, 'getState'])->name('getState');
Route::get('getCity', [App\Http\Controllers\CategoryController::class, 'getCity'])->name('getCity');

Route::get('getSubcategory', [App\Http\Controllers\Front\HomeController::class, 'getSubcategory'])->name('getSubcategory');
Route::get('otp-sent', [App\Http\Controllers\Front\HomeController::class, 'otp_sent'])->name('otp-sent');

Route::get('reset', function (){
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
});




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


            // banks Master route start
            Route::resource('banks', 'App\Http\Controllers\BankController', [
                'names' => [
                    'index'     => 'banks.index',
                    'create'    => 'banks.create',
                    'store'     => 'banks.store',
                    'edit'      => 'banks.edit',
                    'update'    => 'banks.update',
                ],
                'except' => ['show','destroy']
            ]);

            Route::any('banks/paginate/{page?}', ['as' => 'banks.paginate',
                'uses' => 'App\Http\Controllers\BankController@servicesPaginate']);
            Route::any('banks/action', ['as' => 'banks.action',
                'uses' => 'App\Http\Controllers\BankController@servicesAction']);
            Route::any('banks/toggle/{id?}', ['as' => 'banks.toggle',
                'uses' => 'App\Http\Controllers\BankController@servicesToggle']);
            Route::any('banks/drop/{id?}', ['as' => 'banks.drop',
                'uses' => 'banks@drop']);
            // banks

            // testimonials Master route start
            Route::resource('testimonials', 'App\Http\Controllers\TestimonialController', [
                'names' => [
                    'index'     => 'testimonials.index',
                    'create'    => 'testimonials.create',
                    'store'     => 'testimonials.store',
                    'edit'      => 'testimonials.edit',
                    'update'    => 'testimonials.update',
                ],
                'except' => ['show','destroy']
            ]);

            Route::any('testimonials/paginate/{page?}', ['as' => 'testimonials.paginate',
                'uses' => 'App\Http\Controllers\TestimonialController@servicesPaginate']);
            Route::any('testimonials/action', ['as' => 'testimonials.action',
                'uses' => 'App\Http\Controllers\TestimonialController@servicesAction']);
            Route::any('testimonials/toggle/{id?}', ['as' => 'testimonials.toggle',
                'uses' => 'App\Http\Controllers\TestimonialController@servicesToggle']);
            Route::any('testimonials/drop/{id?}', ['as' => 'testimonials.drop',
                'uses' => 'testimonials@drop']);
            // testimonials


            // sliders Master route start
            Route::resource('sliders', 'App\Http\Controllers\SliderController', [
                'names' => [
                    'index'     => 'sliders.index',
                    'create'    => 'sliders.create',
                    'store'     => 'sliders.store',
                    'edit'      => 'sliders.edit',
                    'update'    => 'sliders.update',
                ],
                'except' => ['show','destroy']
            ]);

            Route::any('sliders/paginate/{page?}', ['as' => 'sliders.paginate',
                'uses' => 'App\Http\Controllers\SliderController@servicesPaginate']);
            Route::any('sliders/action', ['as' => 'sliders.action',
                'uses' => 'App\Http\Controllers\SliderController@servicesAction']);
            Route::any('sliders/toggle/{id?}', ['as' => 'sliders.toggle',
                'uses' => 'App\Http\Controllers\SliderController@servicesToggle']);
            Route::any('sliders/drop/{id?}', ['as' => 'sliders.drop',
                'uses' => 'sliders@drop']);
            // sliders
            

            // small sliders Master route start
            Route::resource('landing-sliders', 'App\Http\Controllers\SmallSliderController', [
                'names' => [
                    'index'     => 'landing-sliders.index',
                    'create'    => 'landing-sliders.create',
                    'store'     => 'landing-sliders.store',
                    'edit'      => 'landing-sliders.edit',
                    'update'    => 'landing-sliders.update',
                ],
                'except' => ['show','destroy']
            ]);

            Route::any('landing-sliders/paginate/{page?}', ['as' => 'landing-sliders.paginate',
                'uses' => 'App\Http\Controllers\SmallSliderController@servicesPaginate']);
            Route::any('landing-sliders/action', ['as' => 'landing-sliders.action',
                'uses' => 'App\Http\Controllers\SmallSliderController@servicesAction']);
            Route::any('landing-sliders/toggle/{id?}', ['as' => 'landing-sliders.toggle',
                'uses' => 'App\Http\Controllers\SmallSliderController@servicesToggle']);
            Route::any('landing-sliders/drop/{id?}', ['as' => 'landing-sliders.drop',
                'uses' => 'landing-sliders@drop']);
            // small sliders

            // Contact route start
            Route::resource('contact-enquiry','App\Http\Controllers\ContactController', [
                'names' => [
                    'index'     => 'contact-enquiry.index',
                    'create'    => 'contact-enquiry.create',
                    'store'     => 'contact-enquiry.store',
                    'edit'      => 'contact-enquiry.edit',
                    'update'    => 'contact-enquiry.update',
                ],
                'except' => ['show','destroy']
            ]);

            Route::any('contact-enquiry/paginate/{page?}', ['as' => 'contact-enquiry.paginate',
                'uses' => 'App\Http\Controllers\ContactController@ContactPaginate']);
            Route::any('contact-enquiry/action', ['as' => 'contact-enquiry.action',
                'uses' => 'App\Http\Controllers\ContactController@ContactAction']);
            Route::any('contact-enquiry/toggle/{id?}', ['as' => 'contact-enquiry.toggle',
                'uses' => 'App\Http\Controllers\ContactController@ContactToggle']);
            Route::any('contact-enquiry/drop/{id?}', ['as' => 'contact-enquiry.drop',
                'uses' => 'App\Http\Controllers\ContactController@drop']);

            Route::any('export-enquiry', 'CustomerController@export_enquiry')->name('export-enquiry');
            // Contact route end


            // Blogs Master route start
            Route::resource('blogs', 'App\Http\Controllers\BlogController', [
                'names' => [
                    'index'     => 'blogs.index',
                    'create'    => 'blogs.create',
                    'store'     => 'blogs.store',
                    'edit'      => 'blogs.edit',
                    'update'    => 'blogs.update',
                ],
                'except' => ['show','destroy']
            ]);

            Route::any('blogs/paginate/{page?}', ['as' => 'blogs.paginate',
                'uses' => 'App\Http\Controllers\BlogController@Paginate']);
            Route::any('blogs/action', ['as' => 'blogs.action',
                'uses' => 'App\Http\Controllers\BlogController@Action']);
            Route::any('blogs/toggle/{id?}', ['as' => 'blogs.toggle',
                'uses' => 'App\Http\Controllers\BlogController@Toggle']);
            Route::any('blogs/drop/{id?}', ['as' => 'blogs.drop',
                'uses' => 'blogs@drop']);
            // Blogs

            // company Master route start
            Route::resource('company', 'App\Http\Controllers\CompanyController', [
                'names' => [
                    'index'     => 'company.index',
                    'create'    => 'company.create',
                    'store'     => 'company.store',
                    'edit'      => 'company.edit',
                    'update'    => 'company.update',
                ],
                'except' => ['show','destroy']
            ]);

            Route::any('company/paginate/{page?}', ['as' => 'company.paginate',
                'uses' => 'App\Http\Controllers\CompanyController@companyPaginate']);
            Route::any('company/action', ['as' => 'company.action',
                'uses' => 'App\Http\Controllers\CompanyController@companyAction']);
            Route::any('company/toggle/{id?}', ['as' => 'company.toggle',
                'uses' => 'App\Http\Controllers\CompanyController@companyToggle']);
            Route::any('company/drop/{id?}', ['as' => 'company.drop',
                'uses' => 'company@drop']);
            // company

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

Route::any('terms-and-conditions', [App\Http\Controllers\Frontend\HomeController::class, 'terms_conditions'])->name('terms-and-conditions');
Route::any('privacy-policy', [App\Http\Controllers\Frontend\HomeController::class, 'privacy_policy'])->name('privacy-policy');
Route::any('disclaimer', [App\Http\Controllers\Frontend\HomeController::class, 'disclaimer'])->name('disclaimer');
Route::any('community', [App\Http\Controllers\Frontend\HomeController::class, 'community'])->name('community');

Route::any('contact-us', [App\Http\Controllers\Frontend\HomeController::class, 'contact_us'])->name('contact-us');
Route::any('contact-enquiry', [App\Http\Controllers\Frontend\HomeController::class, 'contact_enquiry'])->name('contact-enquiry');



Route::group(['middleware' => 'user-auth', 'after' => 'no-cache'], function () {

Route::any('log-out', [App\Http\Controllers\Frontend\HomeController::class, 'logout'])->name('user-logout');
Route::any('my-profile', [App\Http\Controllers\Frontend\HomeController::class, 'profileShow'])->name('my-profile');
Route::any('dashboard', [App\Http\Controllers\Frontend\HomeController::class, 'dashboard'])->name('user-dashboard');
Route::any('personal-details', [App\Http\Controllers\Frontend\HomeController::class, 'personal_details'])->name('personal-details');
Route::any('profile-update', [App\Http\Controllers\Frontend\HomeController::class, 'update_profile'])->name('profile-update');
Route::any('cm-details', [App\Http\Controllers\Frontend\HomeController::class, 'cm_details'])->name('cm-details');
Route::any('education-detail', [App\Http\Controllers\Frontend\HomeController::class, 'education_detail'])->name('education-detail');

Route::any('product-requested', [App\Http\Controllers\Frontend\HomeController::class, 'product_requested'])->name('product-requested');

Route::any('address-details', [App\Http\Controllers\Frontend\HomeController::class, 'address_details'])->name('address-details');
Route::any('select-services', [App\Http\Controllers\Frontend\HomeController::class, 'select_services'])->name('select-services');
Route::any('record-video', [App\Http\Controllers\Frontend\HomeController::class, 'Record_Video'])->name('record-video');
Route::any('consent-form', [App\Http\Controllers\Frontend\HomeController::class, 'consent_form'])->name('consent-form');
Route::any('consent-approval', [App\Http\Controllers\Frontend\HomeController::class, 'consent_approval'])->name('consent-approval');
Route::any('thank-you', [App\Http\Controllers\Frontend\HomeController::class, 'ServiceApply'])->name('thank-you');
Route::any('upload-emirates-id', [App\Http\Controllers\Frontend\HomeController::class, 'upload_emirates'])->name('upload-emirates-id');
Route::any('upload-profile-image', [App\Http\Controllers\Frontend\HomeController::class, 'upload_profile_image'])->name('upload-profile-image');

Route::any('emirates-id-verification', [App\Http\Controllers\Frontend\HomeController::class, 'emirates_id_verification'])->name('emirates-id-verification');

Route::any('save-profile-image', [App\Http\Controllers\Frontend\HomeController::class, 'save_profile_image'])->name('save-profile-image');

Route::any('verify-emirates-id', [App\Http\Controllers\Frontend\HomeController::class, 'verify_emirates_id'])->name('verify-emirates-id');

Route::any('verify-emirates', [App\Http\Controllers\Frontend\HomeController::class, 'verify_emirates'])->name('verify-emirates');

});


Route::get('reset', function (){
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
});




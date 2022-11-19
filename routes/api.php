<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::any('v1/enter-mobile', ['as' => 'enter-mobile','uses' => 'App\Http\Controllers\API\V1\UserController@register']);
Route::any('v1/mobile-verify', ['as' => 'mobile-verify','uses' => 'App\Http\Controllers\API\V1\UserController@mobile_verify']);
Route::any('v1/enter-email', ['as' => 'enter-email','uses' => 'App\Http\Controllers\API\V1\UserController@email_register']);
Route::any('v1/email-verify', ['as' => 'email-verify','uses' => 'App\Http\Controllers\API\V1\UserController@email_verify']);
Route::any('v1/sign-up', ['as' => 'sign-up','uses' => 'App\Http\Controllers\API\V1\UserController@sign_up']);

Route::any('v1/login', ['as' => 'login','uses' => 'App\Http\Controllers\API\V1\UserController@login']);
Route::any('v1/login-otp', ['as' => 'login-otp','uses' => 'App\Http\Controllers\API\V1\UserController@login_otp']);
Route::any('v1/profile', ['as' => 'profile','uses' => 'App\Http\Controllers\API\V1\UserController@profile']);
Route::any('v1/update-profile', ['as' => 'update-profile','uses' => 'App\Http\Controllers\API\V1\UserController@updateProfile']);
Route::any('v1/logout', ['as' => 'logout','uses' => 'App\Http\Controllers\API\V1\UserController@logout']);  
Route::any('v1/basic-information', ['as' => 'basic-information','uses' => 'App\Http\Controllers\API\V1\UserController@basic_information']);
Route::any('v1/show-basic-information', ['as' => 'show-basic-information','uses' => 'App\Http\Controllers\API\V1\UserController@show_basic_information']);
Route::any('v1/show-cm-details', ['as' => 'show-cm-details','uses' => 'App\Http\Controllers\API\V1\UserController@show_cm_details']);
Route::any('v1/save-cm-details', ['as' => 'save-cm-details','uses' => 'App\Http\Controllers\API\V1\UserController@save_cm_details']);
Route::any('v1/service-list', ['as' => 'service-list','uses' => 'App\Http\Controllers\API\V1\UserController@service_list']);
Route::any('v1/education-details', ['as' => 'education-details','uses' => 'App\Http\Controllers\API\V1\UserController@education_details']);
Route::any('v1/education-details-save', ['as' => 'education-details-save','uses' => 'App\Http\Controllers\API\V1\UserController@education_details_save']);
Route::any('v1/address-detail', ['as' => 'address-detail','uses' => 'App\Http\Controllers\API\V1\UserController@address_details']);
Route::any('v1/address-details-save', ['as' => 'address-details-save','uses' => 'App\Http\Controllers\API\V1\UserController@address_details_save']);

Route::any('v1/select-service', ['as' => 'select-service','uses' => 'App\Http\Controllers\API\V1\UserController@select_services']);

Route::any('v1/country', ['as' => 'country','uses' => 'App\Http\Controllers\API\V1\UserController@country']);















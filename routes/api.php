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




























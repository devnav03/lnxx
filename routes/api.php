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



Route::any('v1/register', ['as' => 'register','uses' => 'App\Http\Controllers\API\V1\UserController@register']);

Route::any('v1/mobile-verify', ['as' => 'mobile-verify','uses' => 'App\Http\Controllers\API\V1\UserController@mobile_verify']);

Route::any('v1/email-verify', ['as' => 'email-verify','uses' => 'App\Http\Controllers\API\V1\UserController@email_verify']);

Route::any('v1/login', ['as' => 'login','uses' => 'App\Http\Controllers\API\V1\UserController@login']);

Route::any('v1/profile', ['as' => 'profile','uses' => 'App\Http\Controllers\API\V1\UserController@profile']);





























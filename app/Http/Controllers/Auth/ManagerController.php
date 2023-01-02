<?php

namespace App\Http\Controllers\Auth;

use Redirect;
use URL;
use App\User;
use Auth;
use App\Models\Cart;
use App\Models\LoginLog;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Session;

/**
 * Class AuthController
 * @package App\Http\Controllers\Auth
 */
class ManagerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    /**
     * Create a new authentication controller instance.
     *
     * @param Guard $auth
     * @param User $registrar
     */
    public function __construct(Guard $auth, User $registrar)
    {
        $this->auth = $auth;
        //$this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * @return \Illuminate\View\View
     */
    
    public function getLogin()
    {
        return view('manager.layouts.login');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postLogin(Request $request)
    {
    //   dd(\Hash::make($request->password));
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'status' => 1
        ];
       $ip = $request->getClientIp();
        if (!\Request::ajax()) {             
            $validator = (new User)->validateLoginUser($credentials);
            if ($validator->fails()) {
                //dd($validator->messages());
                return redirect()->route('agent')
                    ->withInput()
                    ->withErrors($validator->messages());
            }
            if ($this->auth->attempt($request->only('email', 'password') + ['status' => 1, 'user_type' => 5]) || $this->auth->attempt($credentials + ['user_type' => 5] ))
            {
                if (isManager()) {
                    $LoginLog = new LoginLog();
                    $LoginLog->username = $request->email;
                    $LoginLog->is_login = 1;
                    $LoginLog->user_id = Auth::id();
                    $LoginLog->ip = $ip;
                    $LoginLog->save();
                    return redirect()->intended('manager/dashboard');
                }
            }
           else if ($this->auth->attempt($request->only('email', 'password') + ['status' => 1, 'user_type' => 3]) || $this->auth->attempt($credentials + ['user_type' => 3] ))
            {
                if (isWareHouse()) {
                    $LoginLog = new LoginLog();
                    $LoginLog->username = $request->email;
                    $LoginLog->is_login = 1;
                    $LoginLog->user_id = Auth::id();
                    $LoginLog->ip = $ip;
                    $LoginLog->save();
                    return redirect()->intended('manager/dashboard');
                }
            }
            else{
                $LoginLog = new LoginLog();
                $LoginLog->username = $request->email;
                $LoginLog->is_login = 0;
                $LoginLog->ip = $ip;
                $LoginLog->save();
                return redirect('/manager/lnxx')->with('error', lang('auth.failed_login'));
            }
        }
        else{
            $validator = (new User)->validateLoginUser($credentials);
            if ($validator->fails()) {
                //return validationResponse(false, 206, "", "", $validator->messages());
                $error = [];
                $messages = $validator->messages();
                foreach ($messages->toArray() as $vky => $vkv) {
                    foreach ($vkv as $k => $v) {
                        $error[] = $v; 
                    }
                }
                $html = '';
                foreach ($error as $k => $v) {
                    $html .= '<li>'.$v.'
                        </li>';
                }
                //return  $html;
                return ['error' => $html, 'url'=>''];
            }
            if ($this->auth->attempt($request->only('email', 'password') + ['status' => 1]) || $this->auth->attempt($credentials))
            {
               $user_data = User::where('email', $request->email)->first();
                $inputs = [
                        'user_id' => authUserIdNull()
                            ];
                $user_id =  authUserIdNull();
               $user_data = User::where('id', $user_id)->first();              
               if($user_data['role'] == 1) {
                return ['url'=> route('welcome')];
            } else{
                $succes= '<li class="alert alert-success" role="alert">Login successful</li>';
                // return Redirect::back();
                $redirectTo = \Session::get('redirect_url');
                return ['succes' => $succes, 'url'=> $redirectTo];
            }
        }
            else{
            $user_w_s = User::where('email', $request->email)->where('status', 0)->first();
            if($user_w_s){
                return ['error' => '<li class="alert alert-danger" style="list-style: none;" role="alert">Kindly activate your account first by clicking on the confirmation email sent on your registered email address.</li>'];
            } else {
                return ['error' => '<li class="alert alert-danger" role="alert">'.lang('auth.failed_login').'</li>'];
            }
            }
        }
        
    }
    public function agentLogout()
    {
        \Auth::logout();
        \Session::flush();
        return redirect()->route('agent');
    }

    /**
     * @return int
     */
    public function loginApi()
    {
        return 1;
    }
}
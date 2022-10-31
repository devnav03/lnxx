<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller {
   
 
    public function index() {
        return view('frontend.pages.get_started');
    }

    public function home(){
        try{
            return view('frontend.pages.home');
        } catch (Exception $exception) {
            return back();
        }
    }
















}

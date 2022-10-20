<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


function lang($path = null, $string = null)
{
    $lang = $path;
    if (trim($path) != '' && trim($string) == '') {
        $lang = \Lang::get($path);
    } elseif (trim($path) != '' && trim($string) != '') {
        $lang = \Lang::get($path, ['attribute' => $string]);
    }
    return $lang;
}

function isSuperAdmin()
{
    if(\Auth::check()) {
        return (\Auth::user()->user_type == 1) ? true : false;
    }
}












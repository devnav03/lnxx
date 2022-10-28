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

function apiResponseApp($status, $statusCode, $message, $errors = [], $data = [])
{
    $response = ['success' => $status, 'status' => $statusCode];
    
    if ($message != "") {
        $response['message']['success'] = $message;
    }

    if(isset($errors)){
        if (count($errors) > 0) {
            $response['message']['errors'] = $errors;
        }
    }
    
    if (isset($data)) {
        $response['data'] = $data;
    }
    return response()->json($response);
}

function apiResponseAppmsg($status, $statusCode, $message, $errors = [], $data = [])
{
    $response = ['success' => $status, 'status' => $statusCode];
    
    if ($message != "") {
        $response['message'] = $message;
    }

    if(isset($errors)){
        if (count($errors) > 0) {
            $response['message']['errors'] = $errors;
        }
    }
    
    if (isset($data)) {
        $response['data'] = $data;
    }
    return response()->json($response);
}


function apiResponseAppcart($status, $statusCode, $message, $errors = [], $data = [], $total_amount)
{
    $response = ['success' => $status, 'status' => $statusCode, 'total_amount' => $total_amount];
    
    if ($message != "") {
        $response['message']['success'] = $message;
    }

    if(isset($errors)){
        if (count($errors) > 0) {
            $response['message']['errors'] = $errors;
        }
    }
    
    if (isset($data)) {
        $response['data'] = $data;
    }
    return response()->json($response);
}










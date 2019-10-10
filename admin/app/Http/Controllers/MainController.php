<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
class MainController extends Controller
{
    function index()
    {   
        return view('login');
    }
    function checklogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required'
        ]);

        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );

        if (Auth::attempt($user_data)) {
            Session::put('adminSession', $user_data['email']);
            return view('admin.admin_template');
        } 
       
        else
        {
            return back()->with('error', 'Wrong Login Details');
        }

    }

    function successlogin()
    {
        return view('admin.admin_template');
    }

    function logout()
    {
        Auth::logout();
        Session::forget('adminSession');
        return view('login');
    }
}

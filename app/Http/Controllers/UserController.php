<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginPage()
    {
        if(!Auth::check())
            return view('back.login');
        else
            return redirect()->route('admin.dashboard');

    }

    public function loginPost(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'isDeleted'=>0])){
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function dashboard()
    {
        return view('back.dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginGetController extends Controller
{
    public function login(){
        return view('back.login');
    }
}

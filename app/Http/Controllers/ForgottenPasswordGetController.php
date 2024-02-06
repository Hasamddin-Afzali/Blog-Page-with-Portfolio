<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgottenPasswordGetController extends Controller
{
    public function frogotPass(){
        return view('back.forgotten');
    }
}

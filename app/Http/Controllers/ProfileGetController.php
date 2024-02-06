<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileGetController extends Controller
{
    public function profile(){
  
        return view('back.profile');
     }
}

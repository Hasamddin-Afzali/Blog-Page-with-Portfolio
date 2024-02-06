<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AllUsersGetController extends Controller
{
    public function allUsers(){
  
        return view('back.users');
     }
}

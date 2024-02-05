<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardGetController extends Controller
{
    public function dashboard(){
        return view('back.dashboard');
    }
}

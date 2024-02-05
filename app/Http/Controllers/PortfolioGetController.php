<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioGetController extends Controller
{
    public function portfolio(){
        return view('front.portfolio');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SinglePostGetController extends Controller
{
    public function blogPost(){
        return view('front.singlePage');
    }
}

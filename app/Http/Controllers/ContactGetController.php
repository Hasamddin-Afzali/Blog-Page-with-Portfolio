<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactGetController extends Controller
{
    public function contact(){
        return view('front.contact');
    }
}

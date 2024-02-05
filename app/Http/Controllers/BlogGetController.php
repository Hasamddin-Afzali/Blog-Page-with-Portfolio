<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogGetController extends Controller
{
    public function blog(){
  
        return view('front.blog');
     }
}

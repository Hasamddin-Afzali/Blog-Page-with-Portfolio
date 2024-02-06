<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AllBlogsGetController extends Controller
{
    public function allBlogs(){
  
        return view('back.allBlogs');
     }
}

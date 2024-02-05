<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogsGetController extends Controller
{
    public function blogs(){
        return view('back.blogs');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsGetController extends Controller
{
    public function projects(){
  
        return view('back.projects');
     }
}

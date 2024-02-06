<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesGetController extends Controller
{
    public function categories(){
        return view('back.categories');
    }
}

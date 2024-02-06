<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogsGetController extends Controller
{
    
    public function blogs(){
        return view('back.blogs');
    }
    // public function store(Request $request)
    // {
    //     $content = $request->input('editor_content');
    //     // Now you can do whatever you want with the content, like saving it to the database
    // }
}

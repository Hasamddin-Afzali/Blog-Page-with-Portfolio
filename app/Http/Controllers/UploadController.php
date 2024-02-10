<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        //dd($request->upload);
        if ($request->hasFile('upload')) {

            $originname = $request->file('upload')->getClientOriginalName();
            $filename = pathinfo($originname, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $filename = $filename.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('images'), $filename);
            

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            
            $url = asset('images/' . $filename);
            $msg = 'Image Upload Successfully.';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            
            @header('Content-type: text/html; charset=utf-8');
            
            echo $response;
            //dd($request);
            // $path = '/public/img/post'.now()->format('Ymd');
            // Storage::putFile($path, $request->file('upload'));

        }
    }
}


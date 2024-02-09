<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PostController extends Controller
{
    public function allBlogs(): View
    {
        $data['posts'] = Post::where('isDeleted', 0)
            ->with('category')->with('createdBy')->paginate(3);
        $data['categories'] = Category::where('isDeleted', 0)->get();
        //echo asset('storage/public/img/post20240209/9BspIzcJMek668MmzXtNh7DomBu45UA6DM1zrS8j.png');
        return view('back.allBlogs', $data);
    }

    public function newPost(): View
    {
        $categories = Category::where('isDeleted', 0)->get();
        return view('back.blogs', compact('categories'));
    }

    public function addNewPost(Request $request)
    {

        /*$validation = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'images' => 'array',
            'images.*' => 'image',
            'content' => 'required'
        ]);*/
        //echo $validation;
        //dd($request->file('images'));
        //if(!$validation)
        //    return redirect()->back()->with('error', 'Bilinmeyen bir hata oluştu.');
        $path = '/public/img/post'.now()->format('Ymd');
        Storage::makeDirectory($path);
        if($request->file('images') != null){
            foreach ($request->file('images') as $image)
                Storage::putFile($path, $image);
        }

        Post::create([
            'title'=>$request->title,
            'category'=>$request->category,
            'img_path'=>'/img/blog-back.jpg',
            'body'=>$request->postContent,
            'created_by'=>Auth::user()->id,
            'created_at'=>now()
        ]);

        return redirect()->back()->with('addPost.success', 'Post başarı şekilde eklendi.');
    }
}

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
        $data['categories'] = [];
        $this->treeViewCategories($data['categories']);
        return view('back.allBlogs', $data);
    }
    private function treeViewCategories(&$array, $topId = 0, $level = 0)
    {
        $categories = Category::where('isDeleted', 0)->where('top_category', $topId)->get();
        foreach ($categories as $category){
            $category->title = str_repeat("-", $level).' '.$category->title;
            array_push($array, $category);
            $this->treeViewCategories($array, $category->id, $level+2);
        }
    }

    public function newPost(): View
    {
        $data['edit'] = false;
        $data['categories'] = [];
        $this->treeViewCategories($data['categories']);
        return view('back.blogs', $data);
    }


    public function addNewPost(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
            'shortDescription' => 'required',
            'postContent' => 'required'
        ]);

        $directoryPath = '/public/img/postHeaders';
        $image = $request->file('image');

        if(!Storage::exists($directoryPath))
            Storage::makeDirectory($directoryPath);
        $imagePath = '/storage'.substr(Storage::putFile($directoryPath, $image),6);// 6: public => storage

        Post::create([
            'title'=>$request->title,
            'category'=>$request->category,
            'img_path'=> $imagePath,
            'short_description'=>$request->shortDescription,
            'body'=>$request->postContent,
            'created_by'=>Auth::user()->id,
            'created_at'=>now()
        ]);

        return redirect()->back()->with('addPostSuccess');
    }

    public function editPostPage(Request $request)
    {
        if($request->action == "Update") {
            $data['edit'] = true;
            $post = json_decode($request->post);
            //dd($request->post);
            $data['id'] = $post->id;
            $data['title'] = $post->title;
            $data['categoryId'] = $post->category->id;
            $data['description'] = $post->short_description;
            $data['imagePath'] = $post->img_path;
            $data['postContent'] = $post->body;
            $data['categories'] = Category::where('isDeleted', 0)->get();
            return view('back.blogs', $data);
        }
        else{
            $id = json_decode($request->post)->id;
            $post = Post::where('id', $id)->get()[0];
            $post->isDeleted = 1;
            $post->deleted_by = Auth::user()->id;
            $post->save();
            return redirect()->back()->with('deletePostSuccess');
        }

    }

    public function editPost(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif',
            'shortDescription' => 'required',
            'postContent' => 'required'
        ]);

        $imagePath = $request->imagePath;
        if($request->hasFile('image')){
            $directoryPath = '/public/img/postHeaders';
            $image = $request->file('image');
            if(!Storage::exists($directoryPath))
                Storage::makeDirectory($directoryPath);
            $imagePath = '/storage'.substr(Storage::putFile($directoryPath, $image),6);
        }

        $post = Post::where('id', $request->id)->get()[0];

        $post->title =$request->title;
        $post->category = $request->category;
        $post->img_path = $imagePath;
        $post->short_description = $request->shortDescription;
        $post->body = $request->postContent;
        $post->updated_by = Auth::user()->id;
        $post->save();
        return redirect()->route('admin.blog')->with('editPostSuccess');
    }
}

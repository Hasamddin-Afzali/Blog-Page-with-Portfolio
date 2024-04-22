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
    public function allBlogs()
    {
        try {
            $data['posts'] = Post::where('isDeleted', 0)
                ->with('category')->with('createdBy')->paginate(15);
            $data['categories'] = [];
            CategoryController::treeViewCategories($data['categories']);
            return view('back.allBlogs', $data);
        }catch (\Exception $e){
            toastr()->error('Something went wrong! '.$e->getMessage());
            return redirect()->back();
        }
    }

    public function newPost()
    {
        try {
            $data['edit'] = false;
            $data['categories'] = [];
            CategoryController::treeViewCategories($data['categories']);
            return view('back.blogs', $data);
        }catch (\Exception $e){
            toastr()->error('Something went wrong! '.$e->getMessage());
            return redirect()->back();
        }
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
    try {
        $directoryPath = '/public/img/postHeaders';
        $image = $request->file('image');

        if (!Storage::exists($directoryPath))
            Storage::makeDirectory($directoryPath);
        $imagePath = '/storage' . substr(Storage::putFile($directoryPath, $image), 6); // 6: public => storage

        Post::create([
            'title' => $request->title,
            'category' => $request->category,
            'img_path' => $imagePath,
            'short_description' => addslashes($request->shortDescription),
            'body' => $request->postContent,
            'created_by' => Auth::user()->id,
            'created_at' => now()
        ]);
        toastr()->success('Blog post has been shared successfully.');
    } catch (\Exception $e) {
        toastr()->error('Something went wrong! ' . $e->getMessage());
    }
    return redirect()->back();
}


    public function editPostPage(Request $request)
    {
        if($request->action == "Update") {
            try {
                $data['edit'] = true;
                $post = json_decode($request->post);
                $data['id'] = $post->id;
                $data['title'] = $post->title;
                $data['categoryId'] = $post->category->id;
                $data['description'] = $post->short_description;
                $data['imagePath'] = $post->img_path;
                $data['postContent'] = $post->body;
                $data['categories'] = Category::where('isDeleted', 0)->get();
                return view('back.blogs', $data);
            }catch (\Exception $e){
                toastr()->error('Something went wrong! '.$e->getMessage());
                return redirect()->back();
            }
        }
        else{
            try {
                $id = json_decode($request->post)->id;
                $post = Post::where('id', $id)->get()[0];
                $post->isDeleted = 1;
                $post->deleted_by = Auth::user()->id;
                $post->save();
                toastr()->success('The post has been deleted successfully.');
            }catch (\Exception $e){
                toastr()->error('Something went wrong! '.$e->getMessage());
            }
            return redirect()->back();
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
        try {
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
            toastr()->success('The change has been implemented successfully.');
        }catch (\Exception $e){
            toastr()->error('Something went wrong! '.$e->getMessage());
        }
        return redirect()->route('admin.blog');
    }
}

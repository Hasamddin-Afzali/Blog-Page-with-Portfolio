<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Post;
use Illuminate\Support\Facades\URL;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home()
    {
        try {
            $posts = Post::where('isDeleted', 0)
                ->with('category')->with('createdBy')
                ->orderBy('created_at', 'desc')
                ->take(3)->get();
        }catch (\Exception $e){
            $posts = [];
        }
        return view('front.home', compact('posts'));
    }

    public function blog()
    {
        try {
            $posts = Post::where('isDeleted', 0)
                ->with('category')->with('createdBy')
                ->orderBy('created_at', 'desc')->paginate(10);
        }catch (\Exception $e){
            $posts = [];
        }
        return view('front.blog', compact('posts'));
    }

    public static function listCategories($top = 0): bool
{
    try {
        $categories = Category::where('top_category', $top)->where('isDeleted', 0)->get();
        if ($categories->isEmpty()) {
            return false;
        }

        echo '<ul class="ms-4 list-unstyled">';
        foreach ($categories as $category) {
            $subCount = Category::where('top_category', $category->id)->count();
            echo '<li class="mb-2 list-unstyled">';
            if ($subCount > 0)
                echo '<div class="d-flex align-items-center">
                        <span class="toggle text-primary cursor-pointer me-2"><i class="fas fa-chevron-right"></i></span>';
            echo '<a href="' . URL::to('blog/category?id=' . $category->id) . '" class="text-primary">' . $category->title . '</a>';
            if ($subCount > 0) {
                echo '</div>';
                self::listCategories($category->id);
            }
            echo '</li>';
        }
        echo '</ul>';

        return true;
    } catch (\Exception $e) {
        return false;
    }
}



    public static function listCategories2($top = 0, $root = 0, $writeTop = false): void
{
    try {
        if ($writeTop) {
            $topCategory = Category::where('id', $top)->first();
            $subCount = Category::where('top_category', $topCategory->id)->count();
            echo '<li class="mb-2">';
            if ($subCount > 0)
                echo '<div class="d-flex align-items-center">
                        <span class="toggle text-primary cursor-pointer mr-2"><i class="fas fa-chevron-right text-sm"></i></span>';
            echo '<a href="' . URL::to('blog/category?id=' . $topCategory->id) . '" class="text-primary">' . $topCategory->title . '</a>';
            if ($subCount > 0) {
                echo '</div>';
                self::listCategories($topCategory->id, $root);
            }
            echo '</li>';
        } else {
            $categories = Category::where('top_category', $top)->where('isDeleted', 0)->get();
            if ($top != $root)
                echo '<ul class="ms-4 hidden">';
            foreach ($categories as $category) {
                $subCount = Category::where('top_category', $category->id)->count();
                echo '<li class="mb-2">';
                if ($subCount > 0)
                    echo '<div class="d-flex align-items-center">
                            <span class="toggle text-primary cursor-pointer mr-2"><i class="fas fa-chevron-right text-sm"></i></span>';
                echo '<a href="' . URL::to('blog/category?id=' . $category->id) . '" class="text-primary">' . $category->title . '</a>';
                if ($subCount > 0) {
                    echo '</div>';
                    self::listCategories($category->id, $root);
                }
                echo '</li>';
            }
        }
        if ($top != 0)
            echo '</ul>';
    } catch (\Exception $e) {
    }
}


    private static function getSubCategoryIds(int $id, array &$ids)
    {
        try{
            array_push($ids, $id);
            $subIds = Category::where('isDeleted', 0)->where('top_category', $id)->get();
            foreach ($subIds as $subId) {
                Controller::getSubCategoryIds($subId->id, $ids);
            }
        }catch (\Exception $e){}
    }

    public function blogByCategory(Request $request)
    {
        try{
            $ids = [];
            $this->getSubCategoryIds($request->id, $ids);
            $posts = Post::where('isDeleted', 0)->whereIn('category', $ids)
                ->with('category')->with('createdBy')
                ->orderBy('created_at', 'desc')->paginate(15);
            return view('front.blog', compact('posts'));
        }catch (\Exception $e){
            toastr()->error('Something went wrong'.$e->getMessage());
            return redirect()->route('blog');
        }
    }

    public static function listBlogLinksByCategory($categoryId, $currentPostId){
        try{
            $ids = [];
            Controller::getSubCategoryIds($categoryId, $ids);
            $posts = Post::where('isDeleted', 0)->whereIn('category', $ids)->where('id', '<>', $currentPostId)
                ->orderBy('created_at', 'desc')->take(20)->get();
            foreach ($posts as $post){
                echo '<li class="mb-2"> <a href="'. route('singlePost', $post->id).'" class="text-blue-500">'.$post->title.'</a> </li>';
                //dd($post);
            }
        }catch (\Exception $e){}
    }

    public function post($id)
    {
        try {
            $post = Post::where([['isDeleted', 0],['id', $id]])
                ->with('category')->get();
            return view('front.singlePage', compact('post'));
        }catch (\Exception $e){
            toastr()->error('Something went wrong.');
            return redirect()->back();
        }
    }

    public function portfolio()
    {
        try {
            $projects = Project::where('isDeleted', 0)->orderBy('created_at', 'desc')->get();
            return view('front.portfolio', compact('projects'));
        }catch (\Exception $e){
            toastr()->error('Something went wrong!');
            return redirect()->back();
        }
    }

    public function contact()
    {
        return view('front.contact');
    }
}
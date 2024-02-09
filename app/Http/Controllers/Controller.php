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
use Illuminate\View\View;
use Psy\Util\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home(): View
    {
        $posts = Post::where('isDeleted', 0)
            ->with('category')->with('createdBy')
            ->orderBy('created_at', 'desc')
            ->take(3)->get();
        //dd($posts);
        return view('front.home', compact('posts'));
    }

    public function blog(): View
    {
        $data['posts'] = Post::where('isDeleted', 0)
            ->with('category')->with('createdBy')
            ->orderBy('created_at', 'desc')->get();
        //$data['categories'] = Category::where('isDeleted', 0)->get();
        return view('front.blog', $data);
    }

    public static function listCategories(int $top = 0): void
    {
        $categories = Category::where('top_category', $top)->where('isDeleted',0)->get();
        if($top != 0)
            echo  '<ul class="ml-4 hidden">';
        foreach ($categories as $category) {
            $subCount = Category::where('top_category', $category->id)->count();
            echo '<li class="mb-2">';
            if($subCount > 0)
                echo '<div class="flex items-center">
                            <span class="toggle text-blue-500 cursor-pointer mr-2"><i class="fas fa-chevron-right text-sm"></i></span>';
            echo '<a href="'.URL::to('blog/category?id='.$category->id).'" class="text-blue-500">'.$category->title.'</a>';
            //'blog/category?id='.$category->id
            if($subCount > 0){
                echo '</div>';
                self::listCategories($category->id);
            }

            echo '</li>';
        }
        if($top != 0)
            echo '</ul>';
    }

    private function getSubCategoryIds(int $id, array &$ids)
    {
        array_push($ids, $id);
        $subIds = Category::where('isDeleted', 0)->where('top_category', $id)->get();
        foreach ($subIds as $subId) {
            $this->getSubCategoryIds($subId->id, $ids);
        }
    }

    public function blogByCategory(Request $request): View
    {
        $ids = [];
        $this->getSubCategoryIds($request->id, $ids);
        $posts = Post::where('isDeleted', 0)->whereIn('category', $ids)
            ->with('category')->with('createdBy')
            ->orderBy('created_at', 'desc')->get();
        //dd($posts);
        return view('front.blog', compact('posts'));
    }

    public function post($id): View
    {
        $post = Post::where([['isDeleted', 0],['id', $id]])
            ->with('category')->get();
        //dd($post);
        return view('front.singlePage', compact('post'));
    }

    public function portfolio(): View
    {
        $projects = Project::where('isDeleted', 0)->orderBy('created_at', 'desc')->get();
        return view('front.portfolio', compact('projects'));
    }

    public function contact(): View
    {
        return view('front.contact');
    }
}

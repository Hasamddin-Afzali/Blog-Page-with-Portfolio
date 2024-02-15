<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function category()
    {
        try {
            $categories = [];
            $this->hierarchicalCategories($categories);
            return view('back.categories', compact('categories'));
        }catch (\Exception $e){
            toastr()->error('Something went wrong!');
            return redirect()->back();
        }
    }

    // for dropdown or select option menus
    public static function treeViewCategories(&$array, $topId = 0, $level = 0)
    {
        $categories = Category::where('isDeleted', 0)->where('top_category', $topId)->get();
        foreach ($categories as $category){
            $category->title = str_repeat("-", $level).' '.$category->title;
            array_push($array, $category);
            CategoryController::treeViewCategories($array, $category->id, $level+2);
        }
    }

    // for tables
    public static function hierarchicalCategories(&$array, $topId = 0, $level = 0)
    {
        $categories = Category::where('isDeleted', 0)->where('top_category', $topId)
            ->with('topCategory')->get();
        foreach ($categories as $category){
            $category->title = str_repeat("&nbsp;", $level).' '.$category->title;
            array_push($array, $category);
            CategoryController::hierarchicalCategories($array, $category->id, $level+3);
        }
    }

    public function addNewCategory(Request $request)
    {
        if(preg_match('/[A-Za-z0-9]/', $request->categoryName) == 0){
            toastr()->warning('Please type a valid category name.');
            return redirect()->back();
        }
        try {
            Category::create([
                'title' => $request->categoryName,
                'top_category' => $request->parentCategory,
                'created_by' => Auth::user()->id
            ]);
            toastr()->success('Category added successfully.');
        }catch (\Exception $e){
            toastr()->error('Something went wrong.');
        }
        return redirect()->back();
    }

    public function editCategory(Request $request)
    {
        if(preg_match('/[A-Za-z0-9]/', $request->categoryName) == 0){
            toastr()->warning('Please type a valid category name.');
            return redirect()->back();
        }
        try {
            $category = Category::where('id', $request->id)->get()[0];
            $category->title = $request->categoryName;
            $category->top_category = $request->parentCategory;
            $category->updated_by = Auth::user()->id;
            $category->save();
            toastr()->success('The changes have been saved successfully.');
        }catch (\Exception $e) {
            toastr()->error('Something went wrong!');
        }
        return redirect()->back();
    }

    public function deleteCategory(Request $request)
    {
        try {
            $category = Category::where('id', $request->id)->get()[0];
            $category->isDeleted = 1;
            $category->deleted_by = Auth::user()->id;
            $category->deleted_at = now();
            $category->save();
            toastr()->success('The category was deleted successfully.');
        }catch (\Exception $e){
            toastr()->error('Something went wrong! '.$e->getMessage());
        }
        return redirect()->back();
    }
}

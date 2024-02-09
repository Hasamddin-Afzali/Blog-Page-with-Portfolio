<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', 'HomeGetController@home')->name("home");
//Route::get('/home', 'HomeGetController@home')->name("home");
//Route::get('/blog', 'BlogGetController@blog')->name("blog");
//Route::get('/portfolio', 'PortfolioGetController@portfolio')->name("portfolio");
//Route::get('/contact', 'ContactGetController@contact')->name("contact");
Route::get('/blogPost', 'SinglePostGetController@blogPost')->name("blogPost");

//Route::get('/admin/login', 'LoginGetController@login')->name("login");
Route::get('/admin/frogotPass', 'ForgottenPasswordGetController@frogotPass')->name("frogotPass");
//Route::get('/admin/dashboard', 'DashboardGetController@dashboard')->name("dashboard");
//Route::get('/admin/blogs', 'BlogsGetController@blogs')->name("blogs");
//Route::get('/admin/allBlogs', 'AllBlogsGetController@allBlogs')->name("allBlogs");
Route::get('/admin/allUsers', 'AllUsersGetController@allUsers')->name("allUsers");
Route::get('/admin/profile', 'ProfileGetController@profile')->name("profile");
Route::get('/admin/projects', 'ProjectsGetController@projects')->name("projects");
Route::get('/admin/categories', 'CategoriesGetController@categories')->name("categories");

Route::get('/', 'Controller@home')->name('home');
Route::get('blog', 'Controller@blog')->name('blog');
Route::get('blog/category', 'Controller@blogByCategory')->name('category');
Route::get('blog/{id}', 'Controller@post')->name('singlePost');
Route::get('portfolio', 'Controller@portfolio')->name('portfolio');
Route::get('contact', 'Controller@contact')->name('contact');

Route::prefix('admin')->name('admin.')->group(function (){
    Route::get('login', 'UserController@loginPage')->name('loginPage');
    Route::post('login-post', 'UserController@loginPost')->name('loginPost');
    Route::middleware([IsAuthenticated::class])->group(function (){
        Route::get('dashboard','UserController@dashboard')->name('dashboard');
        Route::get('blog', 'PostController@allBlogs')->name('blog');
        Route::get('blog/new','PostController@newPost')->name('newPost');
        Route::post('blog/new-post', 'PostController@addNewPost')->name('addNewPost');
        Route::get('category', 'CategoryController@category')->name('category');
        Route::get('logout', 'UserController@logout')->name('logout');
    });

});

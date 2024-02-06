<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeGetController;

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

Route::get('/', function () {
    return view('front.home');
});

Route::get('/', 'HomeGetController@home')->name("home");
Route::get('/home', 'HomeGetController@home')->name("home");
Route::get('/blog', 'BlogGetController@blog')->name("blog");
Route::get('/portfolio', 'PortfolioGetController@portfolio')->name("portfolio");
Route::get('/contact', 'ContactGetController@contact')->name("contact");
Route::get('/blogPost', 'SinglePostGetController@blogPost')->name("blogPost");

Route::get('/admin/login', 'LoginGetController@login')->name("login");
Route::get('/admin/frogotPass', 'ForgottenPasswordGetController@frogotPass')->name("frogotPass");
Route::get('/admin/dashboard', 'DashboardGetController@dashboard')->name("dashboard");
Route::get('/admin/blogs', 'BlogsGetController@blogs')->name("blogs");
Route::get('/admin/allBlogs', 'AllBlogsGetController@allBlogs')->name("allBlogs");
Route::get('/admin/allUsers', 'AllUsersGetController@allUsers')->name("allUsers");
Route::get('/admin/profile', 'ProfileGetController@profile')->name("profile");
Route::get('/admin/projects', 'ProjectsGetController@projects')->name("projects");
Route::get('/admin/categories', 'CategoriesGetController@categories')->name("categories");
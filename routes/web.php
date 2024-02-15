<?php

use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/admin/frogotPass', 'ForgottenPasswordGetController@frogotPass')->name("frogotPass");
//Route::get('/admin/allUsers', 'AllUsersGetController@allUsers')->name("allUsers");
//Route::get('/admin/profile', 'ProfileGetController@profile')->name("profile");
//Route::get('/admin/categories', 'CategoriesGetController@categories')->name("categories");

Route::post('upload_image', 'UploadController@upload')->name('upload');

Route::get('/', 'Controller@home')->name('home');
Route::get('blog', 'Controller@blog')->name('blog');
Route::get('blog/category', 'Controller@blogByCategory')->name('category');
Route::get('blog/{id}', 'Controller@post')->name('singlePost');
Route::get('portfolio', 'Controller@portfolio')->name('portfolio');
Route::get('contact', 'Controller@contact')->name('contact');
Route::post('send-contact', 'ContactController@getMessage')->name('getContactMessage');

Route::prefix('admin')->name('admin.')->group(function (){
    Route::get('login', 'UserController@loginPage')->name('loginPage');
    Route::post('login-post', 'UserController@loginPost')->name('loginPost');
    Route::middleware([IsAuthenticated::class])->group(function (){
        Route::get('dashboard','UserController@dashboard')->name('dashboard');
        Route::get('blog', 'PostController@allBlogs')->name('blog');
        Route::get('blog/new','PostController@newPost')->name('newPost');
        Route::post('blog/new-post', 'PostController@addNewPost')->name('addNewPost');
        Route::get('blog/edit','PostController@editPostPage')->name('editPostPage');
        Route::post('blog/edit-post', 'PostController@editPost')->name('editPost');

        Route::get('users', 'UserController@allUsers')->name("allUsers");
        Route::post('users/new-user', 'UserController@addNewUser')->name('addNewUser');
        Route::post('users/edit-user', 'UserController@editUser')->name('editUser');
        Route::post('users/delete-user', 'UserController@deleteUser')->name('deleteUser');
        Route::get('profile', 'UserController@profile')->name('profile');
        Route::post('profile/change-password', 'UserController@changePassword')->name('changePassword');
        Route::get('category', 'CategoryController@category')->name('category');
        Route::post('category/add-new-category', 'CategoryController@addNewCategory')->name('addNewCategory');
        Route::post('category/edit-category', 'CategoryController@editCategory')->name('editCategory');
        Route::post('category/delete-category', 'CategoryController@deleteCategory')->name('deleteCategory');
        Route::get('projects', 'ProjectsGetController@projects')->name("projects");
        Route::post('projects/add-new-project', 'ProjectsGetController@addNewProject')->name('addNewProject');
        Route::post('projects/edit-project', 'ProjectsGetController@editProject')->name('editProject');
        Route::post('projects/delete-project', 'ProjectsGetController@deleteProject')->name('deleteProject');
        Route::get('contacts', 'ContactController@contacts')->name('contacts');
        Route::post('contacts/delete-message', 'ContactController@deleteMessage')->name('deleteMessage');

        Route::get('logout', 'UserController@logout')->name('logout');
    });

});

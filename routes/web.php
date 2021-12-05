<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ComplaintsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});


Route::resource('home',HomeController::class);

//******************************* Resources Routs ********************************************
Route::middleware('auth')->group(function (){
    Route::get('cms',[HomeController::class,'dashboard'])->name('dashboard');

Route::prefix('admin')->group(function () {  //Admin Route Prefix
    //Posts Routs
    Route::resource('posts',PostsController::class);
    //Tags Routs
    Route::resource('tags',TagsController::class);
    //Categories Routs
    Route::resource('categories',CategoriesController::class);
    //Comments Routs
//    Route::resource('comments',CommentsController::class);
    //Comments Routs
    Route::resource('users',UsersController::class);

    Route::resource('menus',MenusController::class);


    Route::resource('transactions',TransactionsController::class);

});
});
Route::post('saveComment/{id}',[HomeController::class,'saveComment'])->name('saveComment');

//******************************* Resources Routs ********************************************

Auth::routes();

Route::resource('complaints',ComplaintsController::class);
Route::resource('projects',ProjectsController::class);


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('publish/{id}',[PostsController::class,'publish'])->name('publish');

Route::view('parent','CMS.parent');

Route::get('search/{text}',[HomeController::class,'search']);

Route::get('media',[HomeController::class,'media'])->name('media');

Route::view('test','blog.app');

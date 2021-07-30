<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SocialShareController;
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

Route::resource('/', PageController::class);
Route::resource('admin/posts', PostController::class);
Route::resource('comments', CommentController::class);
Route::resource('admin/photos', PhotoController::class);
Route::get('social-share', [SocialShareController::class, 'index']);

Route::get('/about', function ()
{
    return view('about');
});
Route::get('/services', function ()
{
    return view('services');
});
Route::get('/contact', function ()
{
    return view('contact');
});
  
Auth::routes();
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
// Route::get('admin/posts', [PostController::class, 'index'])->name('admin.posts')->middleware('is_admin');
// Route::get('admin/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('is_admin');
Route::resource('admin/posts', PostController::class)->middleware('is_admin');
Route::get('posts/{id}', [PostController::class, 'show']);

Route::get('/profile', [ UsersController::class, 'index'])->name('Profile');

Route::post('/profile', [ UsersController::class, 'storeImage' ])->name('images.store');
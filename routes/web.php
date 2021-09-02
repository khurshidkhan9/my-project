<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SocialShareController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ContactUsFormController;
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
Route::delete('admin/posts', [PostController::class, 'deleteAll']);

Route::resource('comments', CommentController::class);
Route::resource('admin/photos', PhotoController::class);
Route::delete('admin/photos', [PhotoController::class, 'deleteAll']);
Route::get('social-share', [SocialShareController::class, 'index']);

Route::get('/about', function ()
{
    return view('about');
});
  
Auth::routes();
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
// Route::get('admin/posts', [PostController::class, 'index'])->name('admin.posts')->middleware('is_admin');
// Route::get('admin/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('is_admin');
Route::resource('admin/posts', PostController::class)->middleware('is_admin');
Route::get('posts/{id}', [PostController::class, 'show']);
Route::get('/services', [PostController::class, 'services']);

Route::resource('admin/users', UsersController::class);
Route::delete('admin/users', [PostController::class, 'deleteAll']);
Route::get('/profile', [ UsersController::class, 'show_profile'])->name('Profile');
Route::post('/profile', [ UsersController::class, 'storeImage' ])->name('images.store');

Route::resource('admin/messages', ContactUsFormController::class)->middleware('is_admin');
Route::get('admin/messages/{id}', [ContactUsFormController::class, 'markAsRead'])->middleware('is_admin');
Route::get('/contact', [ContactUsFormController::class, 'createForm']);

Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');



// Paypal Donation Form
Route::get( 'donation-form',  [ DonationController::class, 'donationForm' ] );
Route::get( 'donation/success',  [ DonationController::class, 'donationSuccess' ] )->name('donation.success');
Route::get( 'donation/cancelled',  [ DonationController::class, 'donationCancelled' ] )->name('donation.cancelled');
Route::get( 'donation/notify_url',  [ DonationController::class, 'donationNotify' ] )->name('donation.notify');
Route::get('/my-mail', [ HomeController::class, 'myMail']);
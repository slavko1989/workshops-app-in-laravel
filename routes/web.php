<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtShopsController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\LikeDislikeController;






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


Route::controller(AdminController::class)->group(function () {
    Route::get('admin/home', 'home');
    Route::get('/redirect', 'redirect')->middleware('auth','verified');
    Route::get('admin/workshops', 'workshops');
    Route::get('admin/edit_user/{id}', 'edit');
    Route::post('admin/edit_user/{id}', 'update');
    Route::get('admin/comm', 'show_comm');
    Route::get('admin/comm/{id}', 'delete_comm');



});
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');   
});
Route::controller(UserController::class)->group(function () {
    Route::get('admin/users', 'users');
    Route::get('home/logout', 'perform');
    Route::get('users/user_panel', 'show_panel');
    Route::get('users/user_panel/{id}', 'delete');
    Route::post('register', 'store');
    Route::get('users/edit_user/{id}', 'edit');
    Route::post('users/edit_user/{id}', 'update');
    Route::post('users/change_pass', 'change_pass');
    Route::get('users/change_pass', 'show_change_pass');



});
Route::controller(ArtShopsController::class)->group(function () {
    Route::get('arts/arts_create', 'create');
    Route::post('arts/arts_create', 'store'); 
    Route::get('arts/arts_show', 'show');
    Route::get('arts/arts_single_details/{id}', 'show_single_workshop');
    Route::get('arts/art_edit/{id}', 'edit');
    Route::post('arts/art_edit/{id}', 'update'); 
    Route::get('arts/arts_show/{id}', 'delete'); 
    Route::post('arts/arts_single_details/{id}', 'store_comm'); 
    Route::get('arts/arts_edit_comm/{id}', 'edit_comm');
    Route::post('arts/arts_edit_comm/{id}', 'update_comm'); 
    Route::get('liked/{id}', 'like');
    Route::get('disliked/{id}', 'dislike');   
   
});



Route::group(['middleware'=>['auth','isUser']], function(){
Route::get('/redirect',[AdminController::class,'redirect']);
});

Route::controller(SignUpController::class)->group(function () {
    Route::post('signups/{id}', 'signup')->name('form_for_signup');
    Route::get('users/user_panel/{id}', 'cancel');
});

Route::controller(LikeDislike::class)->group(function () {
Route::get('section/sidebar/{id}', 'top_liked'); 
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
});

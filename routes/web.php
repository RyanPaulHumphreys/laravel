<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Models\Group;
use App\Models\User;


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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('posts', PostController::class);
Route::resource('groups', GroupController::class);
Route::resource('users', UserController::class);
Route::resource('comments', CommentController::class);
Route::get('groups/{groups}/join', function($group)
{
    App\Models\User::find(auth()->id())->groups()->attach($group);
    return redirect("/groups/$group");
})->middleware(['auth', 'verified']);

Route::get('groups/{groups}/leave', function($group)
{
    App\Models\User::find(auth()->id())->groups()->detach($group);
    return redirect("/groups/$group");
})->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';

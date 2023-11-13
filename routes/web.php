<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',function(){
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard')->middleware('admin');

Route::prefix('posts')->middleware('auth')->group(function(Router $route){
    $route->get('/', [PostController::class,'index'])->name('posts.index');
    $route->get('/post-edit/{post}',[PostController::class,'edit'])->name('post.edit');
    $route->get('/create-post',[PostController::class,'create'])->name('create-post');
    $route->post('/store-post',[PostController::class,'store'])->name('posts.store');
    $route->get('/delete-post/{id}',[PostController::class,'delete'])->name('delete.post');
    $route->get('/edit-post/{post}',[PostController::class,'edit'])->name('edit.post');
    $route->post('/update-post',[PostController::class,'update'])->name('update.post');
});

Route::prefix('users')->group(function(Router $route){
    $route->get('/',[UserController::class,'index'])->name('admin.users.index');
    $route->get('/create',[UserController::class,'create'])->name('admin.user.create');
    $route->post('/store/{role}',[UserController::class,'store'])->name('admin.user.store');
    $route->get('/edit/{user}',[UserController::class,'edit'])->name('admin.user.edit');
    $route->post('/update',[UserController::class,'update'])->name('admin.user.update');
    $route->get('/delete/{user}',[UserController::class,'delete'])->name('admin.user.delete');
});

Route::get('/login' , [AuthController::class,'getLoginPage'])->name('get-login-page');
Route::post('/login' , [AuthController::class,'login'])->name('login');

Route::get('/register' , [AuthController::class,'getRegestrationPage'])->name('get-register-page');
Route::post('/register' , [AuthController::class,'register'])->name('register');


Route::prefix('user')->name('user.')->controller(UserController::class)->group(function(){
    Route::get('/login','index');
});
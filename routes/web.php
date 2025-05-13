<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

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


Route::get('/',[FrontendController::class, 'home'])->name('home');
Route::get('/about',[FrontendController::class, 'about'])->name('about');

//Login
Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/login', [AuthController::class, 'verify'])->name('auth.verify');

//Register
Route::get('/register', [AuthController::class, 'register'])->name('register.index');
Route::post('/register', [AuthController::class, 'registerProcess'])->name('registerProcess.index');
Route::get('/register/activation/{token}', [AuthController::class, 'registerVerify'])->name('register.activation');

Route::group(['middleware' =>['auth'] ],function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});

//Admin
Route::group(['middleware' =>['auth','role:admin'] ],function (){
    Route::prefix('dashboard')->group(function () {
        //Category
        Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
        Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
        Route::post('/category/update{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::post('/category/delete{id}', [CategoryController::class, 'delete'])->name('category.delete');

        //Route Post
        Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
        Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
        Route::post('/posts/update{id}', [PostController::class, 'update'])->name('posts.update');
        Route::post('/posts/delete{id}', [PostController::class, 'delete'])->name('posts.delete');
    });
});

//User
Route::group(['middleware' => 'auth', 'role:user'], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('category', [\App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
        Route::post('category/store', [\App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
        Route::post('category/update{id}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
        Route::post('category/delete{id}', [\App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');
    });
});


//Route Storage
Route::get('/storage/{folder}/{filename}', function ($folder, $filename) {
    $path = storage_path('app/public/' . $folder . '/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->where('filename', '.*')->name('storage.file');

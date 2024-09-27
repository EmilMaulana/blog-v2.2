<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\DashboardPostController;

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


Route::get('/', [FrontController::class, 'index']);

Route::get('/artikel', [PostController::class, 'index']);
//halaman single post
Route::get('/artikel/{post:slug}', [PostController::class, 'show']);
Route::get('/categories', [PostController::class, 'categories']);

// Route::get('/categories', function () {
//     return view('front.categories', [

//         'title' => 'Post Categories',
//         'active' => 'categories',
//         'categories' => Category::all()

//     ]);
// });

Route::get('/about', function () {
    return view('front.about', [
        'title' => 'Tentang Kami',
        'meta_desc' => 'Selamat datang di Teknik Rekayasa, inovasi terbaru dari mahasiswa Teknik Informatika yang berdedikasi untuk berbagi pengetahuan dan semangat pemrograman dengan Anda! Saya adalah seorang mahasiswa yang penuh semangat tentang teknologi dan saya telah menggabungkan pengetahuan untuk menciptakan sumber daya pembelajaran yang luar biasa.',
        'active' => 'about',

    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/dashboard/artikel-saya', [DashboardPostController::class, 'index'])->middleware('auth');
Route::get('/dashboard/artikel-saya/{post:slug}', [DashboardPostController::class, 'show'])->middleware('auth');
Route::get('/dashboard/artikel-saya/{post:slug}/edit', [DashboardPostController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/artikel-saya/{post:slug}', [DashboardPostController::class, 'update'])->middleware('auth');
Route::delete('/dashboard/artikel-saya/{post:slug}', [DashboardPostController::class, 'destroy'])->middleware('auth');
Route::get('/dashboard/artikel/tambah', [DashboardPostController::class, 'create'])->middleware('auth');
Route::post('/dashboard/artikel/tambah', [DashboardPostController::class, 'store'])->middleware('auth');
Route::get('/dashboard/artikel/checkSlug', [DashboardPostController::class, 'checkSlug']);
Route::get('/dashboard/album', [AlbumController::class, 'index'])->middleware('admin');
Route::post('/dashboard/album/tambah', [AlbumController::class, 'store'])->middleware('admin');
Route::delete('/dashboard/album/{album:id}', [AlbumController::class, 'destroy'])->middleware('admin');


Route::resource('/author', DashboardPostController::class)->middleware('auth');
Route::resource('/posts', DashboardPostController::class)->middleware('auth');
// Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::get('/dashboard/categories', [AdminCategoryController::class, 'index'])->middleware('admin');
Route::get('/dashboard/categories/create', [AdminCategoryController::class, 'create'])->middleware('admin');
Route::post('/dashboard/categories/create', [AdminCategoryController::class, 'store'])->middleware('admin');
Route::get('/dashboard/categories/{category:slug}/edit', [AdminCategoryController::class, 'edit'])->middleware('admin');
Route::post('/dashboard/categories/{category:slug}/edit', [AdminCategoryController::class, 'update'])->middleware('admin');

Route::post('/kirim-email', [MemberController::class, 'store']);

Route::post('ckeditor/image_upload', 'EditorController@upload')->name('upload');

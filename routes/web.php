<?php


use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardPostController; 
use App\Http\Controllers\DasboardCampusController; 
use App\Http\Controllers\DashboardProdiController; 
use App\Http\Controllers\DashboardFakultasController; 
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\CampusController;
use Yajra\Datatables\Datatables;

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
    return view('home', [
        "title" => "Home",
        'active' => 'home'


    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Deni Saiful",
        'active' => 'about',
        "email" => "deni.saiful@bmkg.go.id",
        "image" => "img/deni.jpeg"

    ]);
});

Route::get('/campus', function () {
    return view('campus', [
        "title" => "Program Beasiswa",
       
        'active' => 'campus'

    ]);
});





Route::get('/posts', [PostController::class, 'index']);

Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'post Categories',
        'active' => 'categories',
        'categories' => Category::all()

    ]);
});





Route::get('/category/{category:slug}', function (category $category) {
    return view('category', [
        'title' => $category->name,
        'posts' => $category->posts,
        'active' => 'categories',
        'category' => $category->name
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');


Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/register/checkSlug',[RegisterController::class,'checkSlug']);

Route::get('/dashboard/posts/checkSlug',[DashboardPostController::class,'checkSlug']);
Route::resource('/dashboard/posts',DashboardPostController::class)->middleware('auth');
Route::get('/dashboard/categories/checkSlug',[AdminCategoryController::class,'checkSlug'])->middleware('auth');
Route::resource('/dashboard/categories',AdminCategoryController::class)->except('show');

Route::get('/dashboard/user/checkSlug',[UserController::class,'checkSlug'])->middleware('auth');
Route::resource('/dashboard/user',UserController:: class)->except('show')->middleware('auth');
Route::post('/dashboard/user', [UserController::class, 'store']);

Route::resource('/dashboard/beasiswa',BeasiswaController:: class)->middleware('auth');
Route::resource('/dashboard/campus',DasboardCampusController:: class)->middleware('auth');
Route::resource('/dashboard/prodi',DashboardProdiController:: class)->middleware('auth');
Route::resource('/dashboard/fakultas',DashboardFakultasController:: class)->middleware('auth');
Route::resource('/dashboard/programs',ProgramController:: class)->middleware('auth');
Route::resource('/campus',CampusController:: class);



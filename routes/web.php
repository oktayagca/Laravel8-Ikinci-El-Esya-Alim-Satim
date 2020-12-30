<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', function () {
    return view('home.index', ['name' => 'oktay ağca']);
});//eğer bir dosya çağıracaksak bu yapıyı kullanabiliriz

Route::redirect('/anasayfa', 'home');

Route::get('/home2', [HomeController::class, 'index']);

Route::get('/test/{id}', [HomeController::class, 'test']);

//admin panel route
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('adminHome');
    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('adminCategory');
    Route::get('category/add', [App\Http\Controllers\Admin\CategoryController::class, 'add'])->name('adminCategoryAdd');
    Route::post('category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('adminCategoryCreate');
    Route::get('category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('adminCategoryEdit');
    Route::post('category/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('adminCategoryUpdate');
    Route::get('category/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('adminCategoryDelete');
    Route::get('category/show', [App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('adminCategoryAddShow');

    #Product

    Route::prefix('product')->group(function (){
        Route::get('/',[App\Http\Controllers\Admin\ProductController::class,'index'])->name('adminProducts');
        Route::get('create',[App\Http\Controllers\Admin\ProductController::class,'create'])->name('adminProductCreate');
        Route::post('store',[App\Http\Controllers\Admin\ProductController::class,'store'])->name('adminProductStore');
        Route::get('edit/{id}',[App\Http\Controllers\Admin\ProductController::class,'edit'])->name('adminProductEdit');
        Route::post('update/{id}',[App\Http\Controllers\Admin\ProductController::class,'update'])->name('adminProductUpdate');
        Route::get('delete/{id}',[App\Http\Controllers\Admin\ProductController::class,'destroy'])->name('adminProductDelete');
        Route::get('show', [App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('adminProductShow');
    });
});




Route::get('/admin/login', [HomeController::class, 'login'])->name('adminLogin');
Route::post('admin/loginCheck', [HomeController::class, 'loginCheck'])->name('adminLoginCheck');
Route::get('/admin/logout', [HomeController::class, 'logout'])->name('adminLogout');

///////////
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

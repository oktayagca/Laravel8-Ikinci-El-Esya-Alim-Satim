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
    return view('home.index',['name'=>'oktay ağca']);
});//eğer bir dosya çağıracaksak bu yapıyı kullanabiliriz

Route::redirect('/anasayfa','home');

Route::get('/home2', [HomeController::class, 'index']);

Route::get('/test/{id}', [HomeController::class, 'test']);

//admin panel route
Route::get('/admin', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('adminHome')->middleware('auth');;

Route::get('/admin/login', [HomeController::class, 'login'])->name('adminLogin');
Route::post('admin/loginCheck',[HomeController::class,'loginCheck'])->name('adminLoginCheck');
Route::get('/admin/logout', [HomeController::class, 'logout'])->name('adminLogout');

///////////
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

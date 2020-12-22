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
    return view('home.index');
});

Route::get('/home', function () {
    return view('home.index',['name'=>'oktay ağca']);
});//eğer bir dosya çağıracaksak bu yapıyı kullanabiliriz

Route::redirect('/anasayfa','home');

Route::get('/home2', [HomeController::class, 'index']);

Route::get('/test/{id}', [HomeController::class, 'test']);

//admin panel route
Route::get('/admin', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name("adminHome");

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

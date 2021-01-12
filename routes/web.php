<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Route::get('/welcome', function () {
    return view('welcome');
});

//Route::get('/home', function () {
   // return view('home.index', ['name' => 'oktay ağca']);
//});//eğer bir dosya çağıracaksak bu yapıyı kullanabiliriz
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('homePage');
Route::get('/aboutUs', [HomeController::class, 'aboutUs'])->name('aboutUs');
Route::get('/references', [HomeController::class, 'references'])->name('references');
Route::get('/fag', [HomeController::class, 'fag'])->name('faq');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/send-message', [HomeController::class, 'sendMessage'])->name('sendMessage');
Route::get('/product/{id}/{title}', [HomeController::class, 'product'])->name('product');
Route::get('/categoryproducts/{id}/{slug}', [HomeController::class, 'categoryProducts'])->name('categoryProducts');
Route::get('/addtocart/{id}', [HomeController::class, 'addToCart'])->name('addToCart');
Route::post('/getProduct', [HomeController::class, 'getProduct'])->name('getProduct');
Route::get('/productlist/{search}', [HomeController::class, 'productList'])->name('productList');
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
    #Message
    Route::prefix('messages')->group(function (){
        Route::get('/',[App\Http\Controllers\Admin\MessageController::class,'index'])->name('adminMessage');
        Route::get('edit/{id}',[App\Http\Controllers\Admin\MessageController::class,'edit'])->name('adminMessageEdit');
        Route::post('update/{id}',[App\Http\Controllers\Admin\MessageController::class,'update'])->name('adminMessageUpdate');
        Route::get('delete/{id}',[App\Http\Controllers\Admin\MessageController::class,'destroy'])->name('adminMessageDelete');
        Route::get('show', [App\Http\Controllers\Admin\MessageController::class, 'show'])->name('adminMessageShow');
    });

    #image
    Route::prefix('image')->group(function (){
        Route::get('create/{product_id}',[App\Http\Controllers\Admin\ImageController::class,'create'])->name('adminImageCreate');
        Route::post('store/{product_id}',[App\Http\Controllers\Admin\ImageController::class,'store'])->name('adminImageStore');
        Route::get('edit/{id}/{product_id}',[App\Http\Controllers\Admin\ImageController::class,'edit'])->name('adminImageEdit');
        Route::post('update/{id}/{product_id}',[App\Http\Controllers\Admin\ImageController::class,'update'])->name('adminImageUpdate');
        Route::get('delete/{id}/{product_id}',[App\Http\Controllers\Admin\ImageController::class,'destroy'])->name('adminImageDelete');
        Route::get('show', [App\Http\Controllers\Admin\ImageController::class, 'show'])->name('adminImageShow');
    });

    #comment
    Route::prefix('comment')->group(function (){
        Route::get('/',[App\Http\Controllers\Admin\CommentController::class,'index'])->name('adminComment');
        Route::post('update/{id}',[App\Http\Controllers\Admin\CommentController::class,'update'])->name('adminCommentUpdate');
        Route::get('delete/{id}',[App\Http\Controllers\Admin\CommentController::class,'destroy'])->name('adminCommentDelete');
        Route::get('show/{id}', [App\Http\Controllers\Admin\CommentController::class, 'show'])->name('adminCommentShow');
    });

    #Settings
    Route::get('setting',[App\Http\Controllers\Admin\SettingController::class,'index'])->name('adminSetting');
    Route::post('setting/update',[App\Http\Controllers\Admin\SettingController::class,'update'])->name('adminSettingUpdate');
});

Route::middleware('auth')->prefix('myaccount')->namespace('myaccount')->group(function (){
    Route::get('/',[UserController::class,'index'])->name('myProfile');
    Route::get('/my-comments',[UserController::class,'myComments'])->name('myComments');
    Route::get('/destroymyreview/{id}',[UserController::class,'destroyMyComments'])->name('destroyMyComments');
});
Route::middleware('auth')->prefix('user')->namespace('user')->group(function (){
    Route::get('/profile',[UserController::class,'index'])->name('userprofile');
});

Route::get('/admin/login', [HomeController::class, 'login'])->name('adminLogin');
Route::post('admin/loginCheck', [HomeController::class, 'loginCheck'])->name('adminLoginCheck');
Route::get('logout', [HomeController::class, 'logout'])->name('logout');

///////////
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

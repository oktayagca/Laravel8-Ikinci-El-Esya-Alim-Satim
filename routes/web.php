<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ComingOrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopcartController;
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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('homePage');
Route::get('/aboutUs', [HomeController::class, 'aboutUs'])->name('aboutUs');
Route::get('/references', [HomeController::class, 'references'])->name('references');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'contactWithEmail'])->name('contactWithEmail');
Route::post('/send-message', [HomeController::class, 'sendMessage'])->name('sendMessage');
Route::get('/product/{id}/{title}', [HomeController::class, 'product'])->name('product');
Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::post('/products', [HomeController::class, 'productsWithPrice'])->name('productsWithPrice');
Route::get('/category-products/{id}/{slug}', [HomeController::class, 'categoryProducts'])->name('categoryProducts');
Route::post('/getProduct', [HomeController::class, 'getProduct'])->name('getProduct');
Route::get('/product-list/{search}', [HomeController::class, 'productList'])->name('productList');

//admin panel route
Route::middleware('auth')->prefix('admin')->group(function () {

    Route::middleware('admin')->group(function (){
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
            Route::get('show', [App\Http\Controllers\Admin\ProductController::class, 'show'])->name('adminProductShow');
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
            Route::get('/',[CommentController::class,'index'])->name('adminComment');
            Route::post('update/{id}',[CommentController::class,'update'])->name('adminCommentUpdate');
            Route::get('delete/{id}',[CommentController::class,'destroy'])->name('adminCommentDelete');
            Route::get('show/{id}', [CommentController::class, 'show'])->name('adminCommentShow');
        });

        #Settings
        Route::get('setting',[SettingController::class,'index'])->name('adminSetting');
        Route::post('setting/update',[SettingController::class,'update'])->name('adminSettingUpdate');

        #Faq
        Route::prefix('faq')->group(function (){
            Route::get('/',[FaqController::class,'index'])->name('adminFaq');
            Route::get('create',[FaqController::class,'create'])->name('adminFaqCreate');
            Route::post('store',[FaqController::class,'store'])->name('adminFaqStore');
            Route::get('edit/{id}',[FaqController::class,'edit'])->name('adminFaqEdit');
            Route::post('update/{id}',[FaqController::class,'update'])->name('adminFaqUpdate');
            Route::get('delete/{id}',[FaqController::class,'destroy'])->name('adminFaqDelete');
            Route::get('show', [FaqController::class, 'show'])->name('adminFaqShow');
        });
        #order
        Route::prefix('order')->group(function (){
            Route::get('/',[AdminOrderController::class,'index'])->name('adminOrders');
            Route::get('list/{status}',[AdminOrderController::class,'list'])->name('adminOrderList');
            Route::post('create',[AdminOrderController::class,'create'])->name('adminOrderAdd');
            Route::post('store',[AdminOrderController::class,'store'])->name('adminOrderStore');
            Route::get('edit/{id}',[AdminOrderController::class,'edit'])->name('adminOrderEdit');
            Route::post('update/{id}',[AdminOrderController::class,'update'])->name('adminOrderUpdate');
            Route::post('item-update/{id}',[AdminOrderController::class,'itemupdate'])->name('adminOrderItemUpdate');
            Route::get('delete/{id}',[AdminOrderController::class,'destroy'])->name('adminOrderDelete');
            Route::get('show/{id}', [AdminOrderController::class, 'show'])->name('adminOrderShow');
        });
        Route::prefix('user')->group(function (){
            Route::get('/',[AdminUserController::class,'index'])->name('adminUser');
            Route::post('create',[AdminUserController::class,'create'])->name('adminUserAdd');
            Route::post('store',[AdminUserController::class,'store'])->name('adminUserStore');
            Route::get('edit/{id}',[AdminUserController::class,'edit'])->name('adminUserEdit');
            Route::post('update/{id}',[AdminUserController::class,'update'])->name('adminUserUpdate');
            Route::get('delete/{id}',[AdminUserController::class,'destroy'])->name('adminUserDelete');
            Route::get('show/{id}', [AdminUserController::class, 'show'])->name('adminUserShow');
            Route::get('user-role/{id}', [AdminUserController::class, 'userRoles'])->name('adminUserRoles');
            Route::post('user-role-store/{id}', [AdminUserController::class, 'userRoleStore'])->name('adminUserRoleAdd');
            Route::get('user-role-delete/{userid}/{roleid}', [AdminUserController::class, 'userRoleDelete'])->name('adminUserRoleDelete');
        });
    });//admin middleware

});//auth middleware

#userAccount
Route::middleware('auth')->prefix('my-account')->namespace('my-account')->group(function (){
    Route::get('/',[UserController::class,'index'])->name('myProfile');
    Route::get('/my-comments',[UserController::class,'myComments'])->name('myComments');
    Route::get('/destroy-my-comments/{id}',[UserController::class,'destroyMyComments'])->name('destroyMyComments');
});

#user
Route::middleware('auth')->prefix('user')->namespace('user')->group(function (){
    Route::get('/profile',[UserController::class,'index'])->name('userprofile');

    Route::prefix('product')->group(function (){
        Route::get('/',[ProductController::class,'index'])->name('userProducts');
        Route::get('create',[ProductController::class,'create'])->name('userProductCreate');
        Route::post('store',[ProductController::class,'store'])->name('userProductStore');
        Route::get('edit/{id}',[ProductController::class,'edit'])->name('userProductEdit');
        Route::post('update/{id}',[ProductController::class,'update'])->name('userProductUpdate');
        Route::get('delete/{id}',[ProductController::class,'destroy'])->name('userProductDelete');
        Route::get('show', [ProductController::class, 'show'])->name('userProductShow');
    });

    Route::prefix('image')->group(function (){
        Route::get('create/{product_id}',[ImageController::class,'create'])->name('userImageCreate');
        Route::post('store/{product_id}',[ImageController::class,'store'])->name('userImageStore');
        Route::get('edit/{id}/{product_id}',[ImageController::class,'edit'])->name('userImageEdit');
        Route::post('update/{id}/{product_id}',[ImageController::class,'update'])->name('userImageUpdate');
        Route::get('delete/{id}/{product_id}',[ImageController::class,'destroy'])->name('userImageDelete');
        Route::get('show', [ImageController::class, 'show'])->name('adminImageShow');
    });

    Route::prefix('shop-cart')->group(function (){
        Route::get('/',[ShopcartController::class,'index'])->name('userShopcart');
        Route::post('store/{id}',[ShopcartController::class,'store'])->name('userShopcartAdd');
        Route::post('update/{id}',[ShopcartController::class,'update'])->name('userShopcartUpdate');
        Route::get('delete/{id}',[ShopcartController::class,'destroy'])->name('userShopcartDelete');
    });

    Route::prefix('my-order')->group(function (){
        Route::get('/',[OrderController::class,'index'])->name('userOrders');
        Route::post('create',[OrderController::class,'create'])->name('userOrderAdd');
        Route::post('store',[OrderController::class,'store'])->name('userOrderStore');
        Route::get('edit/{id}',[OrderController::class,'edit'])->name('userOrderEdit');
        Route::post('update/{id}',[OrderController::class,'update'])->name('userOrderUpdate');
        Route::get('delete/{id}',[OrderController::class,'destroy'])->name('userOrderDelete');
        Route::get('show/{id}', [OrderController::class, 'show'])->name('userOrderShow');
    });
    Route::prefix('order')->group(function (){
        Route::get('/',[ComingOrderController::class,'index'])->name('userComingOrders');
        Route::get('list/{status}',[ComingOrderController::class,'list'])->name('userComingOrderList');
        Route::post('create',[ComingOrderController::class,'create'])->name('userComingOrderAdd');
        Route::post('store',[ComingOrderController::class,'store'])->name('userComingOrderStore');
        Route::get('edit/{id}',[ComingOrderController::class,'edit'])->name('userComingOrderEdit');
        Route::post('update/{id}',[ComingOrderController::class,'update'])->name('userComingOrderUpdate');
        Route::post('item-update/{id}',[ComingOrderController::class,'itemupdate'])->name('userComingOrderItemUpdate');
        Route::get('delete/{id}',[ComingOrderController::class,'destroy'])->name('userComingOrderDelete');
        Route::get('show/{id}/{product_id}', [ComingOrderController::class, 'show'])->name('userComingOrderShow');
    });
});

#login
Route::get('/admin/login', [HomeController::class, 'login'])->name('adminLogin');
Route::post('admin/loginCheck', [HomeController::class, 'loginCheck'])->name('adminLoginCheck');
Route::get('logout', [HomeController::class, 'logout'])->name('logout');

///////////
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

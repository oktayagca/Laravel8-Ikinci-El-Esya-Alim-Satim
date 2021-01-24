<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\CategoryController;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Faq;
use App\Models\Image;
use App\Models\Message;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use MongoDB\Driver\Session;

class HomeController extends Controller
{
    public static function categorylist()
    {
        return Category::where('parent_id', '=', 0)->where('status', 'True')->with('children')->get();
    }

    public static function getSetting()
    {
        return Setting::first();
    }

    public static function countreview($id)
    {
        return Comment::where('product_id', $id)->where('status', 'True')->count();
    }

    public static function avrgreview($id)
    {
        return Comment::where('product_id', $id)->where('status', 'True')->average('rate');
    }

    public static function footerProduct()
    {
        return Product::select('id', 'title', 'image', 'price', 'slug')->where('status', 'True')->limit(4)->inRandomOrder()->get();
    }

    public function index()
    {
        $setting = Setting::first();
        $slider = Product::select('id', 'title', 'image', 'price', 'slug')->where('status', 'True')->limit(4)->inRandomOrder()->get();
        $popular = Product::select('id', 'title', 'image', 'price', 'slug')->where('status', 'True')->limit(3)->inRandomOrder()->get();
        $last = Product::select('id', 'title', 'image', 'price', 'slug')->where('status', 'True')->limit(3)->orderByDesc('updated_at')->get();
        $picked = Product::select('id', 'title', 'image', 'price', 'slug')->where('status', 'True')->limit(3)->inRandomOrder()->get();
        $picked2 = Product::select('id', 'title', 'image', 'price', 'slug')->where('status', 'True')->limit(3)->inRandomOrder()->get();
        $data = [
            'setting' => $setting,
            'slider' => $slider,
            'popular' => $popular,
            'last' => $last,
            'picked' => $picked,
            'picked2' => $picked2
        ];
        return view('home.index', $data);
    }

    public function references()
    {
        $setting = Setting::first();
        return view('home.references', ['setting' => $setting]);
    }

    public function faq()
    {
        $setting = Setting::first();
        $dataList = Faq::where('status','True')->get()->sortBy('position');
        return view('home.faq', ['dataList' => $dataList,'setting'=>$setting]);
    }

    public function contact()
    {
        $setting = Setting::first();
        return view('home.contact', ['setting' => $setting, 'email' => null]);
    }

    public function contactWithEmail(Request $request)
    {
        $email = $request->input('email');
        $setting = Setting::first();
        return view('home.contact', ['setting' => $setting, 'email' => $email]);
    }

    public function aboutUs()
    {
        $setting = Setting::first();
        return view('home.aboutUs', ['setting' => $setting]);
    }

    public function sendMessage(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = new Message();

        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->subject = $request->input('subject');
        $data->message = $request->input('message');
        $data->ip = $_SERVER['REMOTE_ADDR'];
        $data->save();

        return redirect()->route('contact')->with('success', 'Mesajınız Kaydedilmiştir,Teşekkür Ederiz');
    }

    public function product($id, $title)
    {
        $data = Product::find($id);
        $dataList = Image::where('product_id', $id)->get();
        $picked = Product::select('id', 'title', 'image', 'price', 'slug')->where('status','True')->limit(3)->inRandomOrder()->get();
        $reviews = Comment::where('product_id', $id)->where('status', 'True')->orderByDesc('created_at')->get();
        return view('home.productDetail', ['data' => $data, 'dataList' => $dataList, 'picked' => $picked, 'reviews' => $reviews]);
    }

    public function products()
    {
        $setting = Setting::first();
        $dataList = Product::where('status', 'True')->get();
        return view('home.allProducts', ['dataList' => $dataList,'setting'=>$setting]);
    }

    public function productsWithPrice(Request $request)
    {
        $min = $request->input('minPrice');
        $max = $request->input('maxPrice');

        if ($request->input('maxPrice') == null) {
            if ($request->input('minPrice') == null) {
                $dataList = DB::table('products')->where('status', '=','True')
                    ->where('price', '>=', 0)
                    ->where('price', '<=', 1000000)
                    ->get();

                return view('home.allProducts', ['dataList' => $dataList]);
            } else {
                $dataList = DB::table('products')->where('status', '=','True')
                    ->where('price', '>=', $min)
                    ->where('price', '<=', 1000000)
                    ->get();

                return view('home.allProducts', ['dataList' => $dataList]);
            }
        } elseif ($request->input('minPrice') == null) {
            $dataList = DB::table('products')->where('status', '=','True')
                ->where('price', '>=', 0)
                ->where('price', '<=', $max)
                ->get();
            return view('home.allProducts', ['dataList' => $dataList]);
        } elseif ($request->input('maxPrice') != null) {
            if ($request->input('minPrice') != null) {
                $dataList = DB::table('products')->where('status', '=','True')
                    ->where('price', '>=', $min)
                    ->where('price', '<=', $max)
                    ->get();
                return view('home.allProducts', ['dataList' => $dataList]);
            }
        }
    }

    public function categoryProducts($id, $slug)
    {
        $dataList = Product::where('category_id', $id)->where('status','True')->get();
        $data = Category::find($id);
        return view('home.categoryProducts', ['dataList' => $dataList, 'data' => $data]);
    }

    public function getProduct(Request $request): \Illuminate\Http\RedirectResponse
    {
        $search = $request->input('search');
        $count = Product::where('title', 'like', '%' . $search . '%')->where('status','True')->get()->count();
        if ($count == 1) {
            $data = Product::where('title', 'like', '%' . $search . '%')->where('status','True')->first();
            return redirect()->route('product', ['id' => $data->id, 'title' => $data->title]);
        } else {
            return redirect()->route('productList', ['search' => $search]);
        }

    }

    public function productList($search)
    {
        $setting = Setting::first();
        $dataList = Product::where('title', 'like', '%' . $search . '%')->where('status','True')->get();
        return view('home.searchProducts', ['search' => $search, 'dataList' => $dataList,'setting'=>$setting]);
    }

    public function login()
    {
        return view('admin.login');
    }

    public function loginCheck(Request $request)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('admin');
            }
        } else {
            return view('home.index');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}

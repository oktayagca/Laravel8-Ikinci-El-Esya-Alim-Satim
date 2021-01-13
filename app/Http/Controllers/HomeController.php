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
use Illuminate\Support\Facades\Storage;
use MongoDB\Driver\Session;

class HomeController extends Controller
{
    public static function categorylist()
    {
        return Category::where('parent_id', '=', 0)->with('children')->get();
    }

    public static function getSetting()
    {
        return Setting::first();
    }
    public static function countreview($id)
    {
        return Comment::where('product_id',$id)->where('status','True')->count();
    }
    public static function avrgreview($id)
    {
        return Comment::where('product_id',$id)->where('status','True')->average('rate');
    }

    public function index()
    {
        $setting = Setting::first();
        $slider = Product::select('id', 'title', 'image', 'price', 'slug')->limit(4)->inRandomOrder()->get();
        $daily = Product::select('id', 'title', 'image', 'price', 'slug')->limit(3)->inRandomOrder()->get();
        $last = Product::select('id', 'title', 'image', 'price', 'slug')->limit(3)->orderByDesc('id')->get();
        $picked = Product::select('id', 'title', 'image', 'price', 'slug')->limit(3)->inRandomOrder()->get();
        $picked2 = Product::select('id', 'title', 'image', 'price', 'slug')->limit(3)->inRandomOrder()->get();
        $data = [
            'setting' => $setting,
            'slider' => $slider,
            'daily' => $daily,
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
        $dataList = Faq::all()->sortBy('position');
        return view('home.faq', ['dataList' => $dataList]);
    }

    public function contact()
    {
        $setting = Setting::first();
        return view('home.contact', ['setting' => $setting]);
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
        $picked = Product::select('id', 'title', 'image', 'price', 'slug')->limit(3)->inRandomOrder()->get();
        $reviews = Comment::where('product_id',$id)->where('status','True')->orderByDesc('created_at')->get();
        return view('home.productDetail',['data'=>$data,'dataList'=>$dataList,'picked'=>$picked,'reviews'=>$reviews]);
    }

    public function categoryProducts($id, $slug)
    {
        $dataList = Product::where('category_id', $id)->get();
        $data = Category::find($id);
        return view('home.categoryProducts', ['dataList' => $dataList, 'data' => $data]);
    }


    public function getProduct(Request $request): \Illuminate\Http\RedirectResponse
    {
        $search = $request->input('search');
        $count =Product::where('title','like','%'.$search.'%')->get()->count();
        if($count==1){
            $data = Product::where('title','like','%'.$search.'%')->first();
            return redirect()->route('product',['id'=>$data->id,'title'=>$data->title]);
        }else{
            return redirect()->route('productList',['search'=>$search]);
        }

    }
    public function productList($search)
    {
        $dataList = Product::where('title','like','%'.$search.'%')->get();
        return view('home.searchProducts', ['search' => $search,'dataList'=>$dataList]);
    }
    public function addToCart()
    {
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

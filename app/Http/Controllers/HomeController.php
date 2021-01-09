<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\CategoryController;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public static function categorylist(){
        return Category::where('parent_id','=',0)->with('children')->get();
    }
    public static function getSetting(){
        return Setting::first();
    }

    public function  index(){
        $setting = Setting::first();
        return view('home.index',['setting'=>$setting]);
    }
    public function  references(){
        $setting = Setting::first();
        return view('home.references',['setting'=>$setting]);
    }
    public function  faq(){
        $setting = Setting::first();
        return view('home.index',['setting'=>$setting]);
    }
    public function  contact(){
        $setting = Setting::first();
        return view('home.contact',['setting'=>$setting]);
    }
    public function  aboutUs(){
        $setting = Setting::first();
        return view('home.aboutUs',['setting'=>$setting]);
    }

    public function login(){
        return view('admin.login');
    }

    public function loginCheck(Request $request)
    {
        if($request->isMethod('post'))
        {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('admin');
            }
        }
        else
        {
            return view('home.index');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function test($id){
        echo "Id number:",$id;
    }

}

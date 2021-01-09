<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\CategoryController;
use App\Models\Category;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use MongoDB\Driver\Session;

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
    public function  sendMessage(Request $request){
        $data = new Message();

        $data->name =$request->input('name');
        $data->email =$request->input('email');
        $data->phone =$request->input('phone');
        $data->subject =$request->input('subject');
        $data->message =$request->input('message');
        $data->ip=$request->getClientIp();
        $data->save();

        return redirect()->route('contact')->with('success','Mesajınız Kaydedilmiştir,Teşekkür Ederiz');
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

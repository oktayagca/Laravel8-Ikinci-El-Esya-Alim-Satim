<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function  index(){
        return view('home.index');
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
        return redirect('/admin/login');
    }
    public function test($id){
        echo "Id number:",$id;
    }

}

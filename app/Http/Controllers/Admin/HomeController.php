<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function  index(){
        return view('admin.index');
    }
    public static function messageList()
    {
        return Message::where('status', 'False')->get();
    }
}

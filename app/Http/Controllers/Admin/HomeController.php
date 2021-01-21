<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
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
    public static function newComments()
    {
        return Comment::where('status', 'new')->get();
    }
    public static function newProducts()
    {
        return Product::where('status', 'false')->get();
    }
    public static function userCount()
    {
        return User::all()->count();
    }
    public static function productCount()
    {
        return Product::all()->count();
    }
    public static function commentCount()
    {
        return Comment::all()->count();
    }
    public static function messageCount()
    {
        return Message::all()->count();
    }
    public static function orderCount()
    {
        return Order::all()->count();
    }
    public static function newOrders()
    {
        return Order::where('status','new')->count();
    }

}

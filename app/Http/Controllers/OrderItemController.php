<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderItemController extends Controller
{
    public function ShowOrder(){
        $user_id=Auth::id();
        $orders=Order::with('items.product')->where('user_id',$user_id)->get();
        $categories = Category::withCount('products')->get();
        return view('customer.order',compact('orders','categories'));
    }
}

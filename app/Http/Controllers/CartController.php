<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class CartController extends Controller
{
    public function AddToCart(Request $request,$product_id){
        $cart=new Cart();
        $cart->user_id=Auth::id();
        $cart->product_id=$product_id ;
        $cart->quantity=$request->quantity;
        $cart->save();
        
        return redirect()->back();
   }

   public function showCart(){
        $categories = Category::withCount('products')->get();
        $user_id=Auth::id();
        $carts=Cart::with('product')->where('user_id',$user_id)->get();
        return view('customer.Cart',compact('carts','categories'));
   }

   public function deleteProductCart($id){
    $cart=Cart::find($id);
    $cart->delete();
    return redirect()->back();
}
}

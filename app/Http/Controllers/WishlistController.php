<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function showWishlist(){
       
        $user_id=Auth::id();
        $wishlist=Wishlist::where('user_id',$user_id)->get();
        $categories = Category::withCount('products')->get();
        return view('customer.wishlist',compact('wishlist','categories'));
    }

    public function AddToWishlist(Request $request){
        $wishlist=new Wishlist();
        $wishlist->user_id=Auth::id();
        $wishlist->product_id=$request->product_id ;
        $wishlist->save();
        return redirect()->back();
    }

    public function AddToCartofWishlist(Request $request){
        $cart=new Cart();
        $cart->user_id=Auth::id();
        $cart->product_id=$request->product_id ;
        $cart->quantity='1';
        $cart->save();
        
        return redirect()->back();
    }
}

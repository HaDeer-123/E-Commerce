<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Order_Item;
use App\Models\Coupon;
use Carbon\Carbon;


use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function showProduct(){
        $products=Product::all();
        return view('admin.product.showProduct',compact('products'));
    }

   public function addProduct(){
        $categories=Category::all();
        return view('admin.product.addProduct',compact('categories'));
   }

   public function insertProduct(Request $request){
        $products=new Product();
        $products->name=$request->name;
        $products->description=$request->description;
        $products->color=$request->color;
        $products->size=$request->size;
        $products->status=$request->status;
        $products->price=$request->price;
        $products->category_id=$request->category_id;
        $products->stock_quantity=$request->stock_quantity;
        $img=$request->image;
        if($img){
            $imgname=time().'.'.$img->getClientOriginalExtension();
            $request->image->move('image',$imgname);
            $products->image=$imgname;
            }
        $products->save();
        return redirect()->back();

   }

   public function editProduct($id){
        $product=Product::find($id);
        $categories=Category::all();
        return view('admin.product.editProduct',compact('product','categories'));
   }

   public function updateProduct(Request $request,$id){
        $product=Product::find($id);
        $product->name=$request->name;
        $product->description=$request->description;
        $product->color=$request->color;
        $product->size=$request->size;
        $product->status=$request->status;
        $product->price=$request->price;
        $product->category_id=$request->category_id;
        $product->stock_quantity=$request->stock_quantity;
        $img=$request->image;
        if($img){
            $imgname=time().'.'.$img->getClientOriginalExtension();
            $request->image->move('image',$imgname);
            $product->image=$imgname;
            }
        $product->save();
        return redirect()->back();
   }

   public function deleteProduct($id){
    $product=Product::find($id);
    $product->delete();
    return redirect()->back();
   }


   //Customers Products In Home Page...

   public function shopProducts(Request $request){
     
     $categories = Category::withCount('products')->get();
     $coupon=Coupon::all();
     $today = Carbon::today()->format('Y-m-d');
     $sort = $request->sort; 

        $products = Product::with('reviews');

        // Apply sorting based on user selection
        if ($sort == 'latest') {
            $products = $products->latest(); // Order by creation date (latest)
        } elseif ($sort == 'popularity') {
            $products = $products->withCount('reviews')
            ->orderBy('reviews_count', 'desc'); // Order by most reviews (popularity)
        } elseif ($sort == 'best_rating') {
            $products = $products->withAvg('reviews', 'rating')
            ->orderBy('reviews_avg_rating', 'desc'); // Order by average rating (best rating)
        }

        $products = $products->get(); // Get the final results

        $perPage = $request->show;

    // Fetch products with pagination, passing the number of items per page
    $products = Product::paginate($perPage);


     return view('customer.shop',compact('categories','products','coupon','today'));
   }

   public function showProductDetails($id){
        $products = Product::with('reviews')->get();
        $product = Product::with('reviews')->find($id);
        $categories = Category::withCount('products')->get();
        return view('customer.productDetails',compact('product','categories','products'));
   }

   public function createOrder(Request $request){
        $order=new Order();
        $order->user_id=Auth::id();
        $order->shipping_address=$request->shipping_address ;
        $order->total_amount=$request->quantity * $request->price ;
        $order->save();
        $orderItem=new Order_Item();
        $orderItem->product_id=$request->product_id;
        $orderItem->order_id=$order->id;
        $orderItem->quantity=$request->quantity;
        $orderItem->price=$request->price;
        $orderItem->save();
        return redirect()->back();
   }
   

}

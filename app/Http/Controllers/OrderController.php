<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showOrder(){
        $orders=Order::with('items.product')->get();
        return view('admin.order.showOrder',compact('orders'));
    }

 
   public function editOrder($id){
        $order=Order::find($id);
        return view('admin.order.editOrder',compact('order'));
   }

   public function updateOrder(Request $request,$id){
        $order=Order::find($id);
     //    $order->name=$request->name;
     //    $order->total_amount=$request->total_amount;
     //    $order->shipping_address=$request->shipping_address;
        $order->order_status=$request->order_status;
        $order->payment_status=$request->payment_status;
        $order->save();
        
     //    $orderItems=Order_Item::where('order_id',$id);
     //    $orderItems->quantity=$request->quantity;
     //    $orderItems->price=$request->price;
     //    $orderItems->save();

        return redirect()->back();
   }

   public function deleteOrder($id){
    $order=Order::find($id);
    $order->delete();
    return redirect()->back();
   }
}

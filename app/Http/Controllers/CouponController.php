<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function showCoupon(){
        $coupon=Coupon::all();
        return view('admin.coupon.showCoupon',compact('coupon'));
    }

   public function addCoupon(){
        return view('admin.coupon.addCoupon');
   }

   public function insertCoupon(Request $request){
        $coupon=new Coupon();
        $coupon->valid_to=$request->valid_to;
        $coupon->valid_from=$request->valid_from;
        $coupon->discount_percentage=$request->discount_percentage;
        $coupon->code=$request->code;
        
        $coupon->save();
        return redirect()->back();

   }

   public function editCoupon($id){
        $coupon=Coupon::find($id);
        return view('admin.coupon.editCoupon',compact('coupon'));
   }

   public function updateCoupon(Request $request,$id){
        $coupon=Coupon::find($id);
        $coupon->valid_to=$request->valid_to;
        $coupon->valid_from=$request->valid_from;
        $coupon->discount_percentage=$request->discount_percentage;
        $coupon->code=$request->code;
        $coupon->save();
        return redirect()->back();
   }

   public function deleteCoupon($id){
    $coupon=Coupon::find($id);
    $coupon->delete();
    return redirect()->back();
   }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function showReview(){
        $reviews=Review::all();
        return view('admin.review.showReview',compact('reviews'));
    }

 
   public function editReview($id){
        $review=Review::find($id);
        return view('admin.review.editReview',compact('review'));
   }

   public function updateReview(Request $request,$id){
        $review=Review::find($id);
        $review->order_status=$request->order_status;
        
        $review->save();

        return redirect()->back();
   }

   public function deleteReview($id){
    $review=Review::find($id);
    $review->delete();
    return redirect()->back();
   }

   public function makeReview(Request $request){
          $review=new Review();
          $review->rating=$request->rating;
          $review->review=$request->review;
          $review->user_id=Auth::id();
          $review->product_id=$request->product_id;
          $review->save();
          return redirect()->back();
   }

   public function makeReact(Request $request,$product_id){
     $review=new Review();
     $review->rating='5';
     //$review->review=$request->review;
     $review->user_id=Auth::id();
     $review->product_id=$product_id;
     $review->save();
     return redirect()->back();
}
}

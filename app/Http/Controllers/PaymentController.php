<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function showPayment(){
        $payment=Payment::all();
        return view('admin.payment.showPayment',compact('payment'));
    }

 
   public function editPayment($id){
        $payment=Payment::find($id);
        return view('admin.payment.editPayment',compact('payment'));
   }

   public function updatePayment(Request $request,$id){
        $payment=Payment::find($id);
        $payment->payment_status=$request->payment_status;
       
        $payment->save();

        return redirect()->back();
   }

   public function deletePayment($id){
    $payment=Payment::find($id);
    $payment->delete();
    return redirect()->back();
   }
}

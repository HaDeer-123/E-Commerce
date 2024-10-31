<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Contact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function baseHome(){
        $categories = Category::withCount('products')->get();
        $products = Product::with('reviews')->get();
        $recentProducts = Product::with('reviews')->latest()->get();
        return view('customer.Home',compact('categories','products','recentProducts'));
     }


    public function index()
    {
        if( Auth::user()->user_type =='user'){
            $categories = Category::withCount('products')->get();
            $products = Product::with('reviews')->get();
            $recentProducts = Product::with('reviews')->latest()->get();
            return view('customer.Home',compact('categories','products','recentProducts'));
        }else{
            return view('admin.home');
        }
        
    }

   
    public function showUsers(){
        $users=User::all();
        return view('admin.users.showUsers',compact('users'));
    }

    public function editUser($id){
        $user=User::find($id);
        return view('admin.users.editUser',compact('user'));
    }

    public function updateUser(Request $request,$id){
        $user=User::find($id);
        $request->validate([
            'id'=>'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            
        ]);
        
        $user->id=$request->id;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();
        return redirect()->back();
        
    }

    public function deleteUser($id){
        $user=User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function showContactForm(){
        $categories = Category::withCount('products')->get();
        return view('customer.contact',compact('categories'));
    }

    public function contactUS(Request $request){
        $contact=new Contact;
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->subject=$request->subject;
        $contact->message=$request->message;
        $contact->save();
        return redirect()->back();
    }

    public function showProfileDetails(){
        $categories = Category::withCount('products')->get();
        $user_id=Auth::id();
        $user=User::find($user_id);
        return view('customer.userProfile',compact('categories','user'));
    }

    public function updateUserData(Request $request){
        $user_id=Auth::id();
        $user=User::find($user_id);
        $request->validate([
           
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            
        ]);
        
        
        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();
        return redirect()->back();
    }
}

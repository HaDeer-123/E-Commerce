<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function showCategory(){
        $categories=Category::all();
        return view('admin.category.showCategory',compact('categories'));
    }

   public function addCategory(){
        return view('admin.category.addCategory');
   }

   public function insertCategory(Request $request){
        $categories=new Category();
        $categories->name=$request->name;
        $categories->description=$request->description;
        $img=$request->image;
        if($img){
            $imgname=time().'.'.$img->getClientOriginalExtension();
            $request->image->move('image',$imgname);
            $categories->image=$imgname;
            }
        $categories->save();
        return redirect()->back();

   }

   public function editCategory($id){
        $category=Category::find($id);
        return view('admin.category.editCategory',compact('category'));
   }

   public function updateCategory(Request $request,$id){
        $category=Category::find($id);
        $category->name=$request->name;
        $category->description=$request->description;
        $img=$request->image;
        if($img){
            $imgname=time().'.'.$img->getClientOriginalExtension();
            $request->image->move('image',$imgname);
            $category->image=$imgname;
            }
        $category->save();
        return redirect()->back();
   }

   public function deleteCategory($id){
    $category=Category::find($id);
    $category->delete();
    return redirect()->back();
   }


// Users Pages

public function getCategory(){
     $categories = Category::withCount('products')->get();
     return view('customer.Home',compact('categories'));
 }

}

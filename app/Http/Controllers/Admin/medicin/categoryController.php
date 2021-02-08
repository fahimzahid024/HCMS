<?php

namespace App\Http\Controllers\Admin\medicin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category\Category;
use App\product\Product;
use Session;

class categoryController extends Controller
{
    public function manage_category(){
        return view('Admin.category.add_category');
    }
    public function save_category(Request $request){
        if($files = $request -> file('image'))
        {
            $imagePath = public_path('/images/'); // upload path
            // Upload Orginal Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($imagePath, $profileImage);
            
            
            $category = new Category();
            $category -> name = $request -> name;
            $category -> cat_des = $request -> cat_des;
            $category -> image = "$profileImage";
            try{
                $category->save();
                Session::flash('success','Category Added Successfully!');
                return redirect()->back();
            }catch(\Exception $e){
                Session::flash('success','Oops something wrong!');
                return redirect()->back();
            }
        }
    }
    public function view_category(){
        $getData = Category::orderBy('category_id','DESC')->get();
        return view('Admin.category.view_category',compact('getData'));
    }
    public function category_wise_product($category_id){
        $products = Product::where('cat_id',$category_id)->get();
        return view('user.category_wise_product',compact('products',$products));
    }

    public function delete_category($id){
        $delete_doctor = Category::where('category_id',$id)
                         ->delete();
        Session::flash('success','Category Deleted Successfully!');
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Admin\medicin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product\Product;
use App\category\Category;
use Session;

class productController extends Controller
{
    public function manage_product(){
        $category_data = Category::get();
        return view('Admin.product.add_product',compact('category_data'
    ));
    }
    public function save_product(Request $request){
        if($files = $request -> file('image'))
        {
            $imagePath = public_path('/images/'); // upload path
            // Upload Orginal Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($imagePath, $profileImage);
            
            
            $product = new Product();
            $product -> name = $request -> name;
            $product -> product_des = $request -> product_des;
            $product -> price = $request -> tablet_price;
            $product -> cat_id = $request -> cat_id;
            $product -> image = "$profileImage";
            try{
                $product->save();
                Session::flash('success','Product Added Successfully!');
                return redirect()->back();
            }catch(\Exception $e){
                Session::flash('success','Oops something wrong!');
                return redirect()->back();
            }
        }
    }
    public function view_product(){
        $getData = Product::orderBy('product_id','DESC')->get();
        return view('Admin.product.view_product',compact('getData'));
    }

    public function delete_product($id){
        $delete_doctor = Product::where('product_id',$id)
                         ->delete();
        Session::flash('success','Product Deleted Successfully!');
        return redirect()->back();
    }
}

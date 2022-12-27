<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\storage;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function category(){

        return view('admin.category');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_image'=> 'required | image',
            'category_name'=> 'required | string',
        ]);

        $category = new category;
        $category->category_name=$request->category_name;

        $ct_img = $request->file('category_image');
        Storage::putFile('public/ct_img', $ct_img);
        $category->category_image = "storage/ct_img/".$ct_img->hashName();

        $category->save();

        return redirect()->route('category.list')->with('success', 'New Category created successfully');
    }

    public function list()
    {
        $category = Category::all();
        return view('admin.categoryList', compact('category'));
    }

    public function destroy($id)
    {
        $project = Category::find($id);
        @unlink(public_path($project->category_image));
        $project->delete();
        
        return redirect()->route('category.list')->with('success', 'Category deleted successfully');
    }

    public function add_product(){
        $category = category::all();
        return view('admin.product', compact('category'));
    }

    public function store_product(Request $request){

        $product = new product;

        $product -> title = $request -> product_title;
        $product -> description = $request -> product_description;
        $product -> price = $request -> product_price;
        $product -> discount_price = $request -> discount_price;
        $product -> quantity = $request -> product_quantity;
        $product -> category = $request -> category;

        // $image = $request -> product_image;
        // $imagename = time(). '.'.$image->getClientOriginalExtension();
        // $request -> product_image->move('product',$imagename);
        // $product -> product_image = $imagename;

        $image = $request -> file('image');
        Storage::putFile('public/img', $image);
        $product->image = "storage/img/".$image->hashName();

        $product -> save();

        return redirect() -> back();
    }

    public function all_product(){

        $product = product::all();
        return view('admin.all_product', compact('product'));
    }
}

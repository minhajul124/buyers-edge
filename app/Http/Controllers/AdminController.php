<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\storage;
use App\Models\Category;

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
}

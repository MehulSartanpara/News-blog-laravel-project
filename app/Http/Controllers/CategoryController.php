<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;



class CategoryController extends Controller
{
    function index(){
        $catagory = Category::all();
        return view('admin/category',compact('catagory'));
    }
    function create(){
        return view('admin/add-category');
    }

    function store(Request $request){

        $category = new Category();
        $category->category_name = $request->input('cat');
        $category->save();
        return redirect('admin/category')->with('success','Category Added Successfully');
    }

    function update($cat_id)
    {
        $category = Category::find($cat_id);
        return view('admin/update-category',compact('category'));
    }

    function edit(Request $request, $cat_id)
    {
        $category = Category::find($cat_id);
        $category->category_name = $request->input('cat');
        $category->update();
        return redirect('admin/category')->with('update','Category Update Successfully');
    }

    function destroy($cat_id)
    {
        $category = Category::find($cat_id);
        $category->delete();
        return redirect('admin/category')->with('delete','Category Delete Successfully');
    }

}

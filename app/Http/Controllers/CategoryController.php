<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\Admin;

class CategoryController extends Controller
{
    function index(){
        $LogIn = array();
        if(session()->has('loginId')){
            $LogIn =  Admin::where('id','=', session()->get('loginId'))->first();
        } 
        $catagory = Category::all();
        return view('admin/category',compact('catagory','LogIn'));
    }
    function create(){
        $LogIn = array();
        if(session()->has('loginId')){
            $LogIn =  Admin::where('id','=', session()->get('loginId'))->first();
        } 
        return view('admin/add-category',compact('LogIn'));
    }

    function store(Request $request){

        $request->validate([
            'cat' => 'required',
            'no_post' => 'required',
        ]);

        $category = new Category();
        $category->category_name = $request->input('cat');
        $category->no_post = $request->input('no_post');
        $category->save();
        return redirect('admin/category')->with('success','Category Added Successfully');
    }

    function update($cat_id)
    {
        $LogIn = array();
        if(session()->has('loginId')){
            $LogIn =  Admin::where('id','=', session()->get('loginId'))->first();
        }
        $category = Category::find($cat_id);
        return view('admin/update-category',compact('category','LogIn'));
    }

    function edit(Request $request, $cat_id)
    {
        $request->validate([
            'cat' => 'required',
            'no_post' => 'required',
        ]);
        $category = Category::find($cat_id);
        $category->category_name = $request->input('cat');
        $category->no_post = $request->input('no_post');
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

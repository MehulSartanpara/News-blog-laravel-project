<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Post;


class HomeController extends Controller
{
     // For FrontEnd Data
     public function allData(){
        $post = Post::orderBy('id','asc')->paginate(5);
        $re_post = Post::orderBy('id','desc')->paginate(5);
        $catagory = Category::all();
        $post_marque = Post::all();
        return view('index',compact('post','catagory','re_post','post_marque'));
    }

    function SinglePost($id)
    {
        $post = Post::find($id);
        $re_post = Post::orderBy('id','desc')->paginate(5);
        $catagory = Category::all();
        $post_marque = Post::all();
        return view('single-post',compact('post','catagory','re_post','post_marque'));
    }

    function Search(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != ""){
            $post = Post::where('title', 'LIKE', "%$search%")->orWhere('admin', 'LIKE', "%$search%")->orWhere('category', 'LIKE', "%$search%")->get();
            $catagory = Category::all();
            $post_marque = Post::all();
            return view('search',compact('post','catagory','search','post_marque'));
        }else{
            return redirect('/');
        }
    }
}

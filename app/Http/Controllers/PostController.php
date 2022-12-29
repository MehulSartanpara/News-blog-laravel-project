<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

use App\Models\Category;

use App\Models\Post;

use App\Models\Admin;


class PostController extends Controller
{
    public function index(){
        $LogIn = array();
        if(session()->has('loginId')){
            $LogIn =  Admin::where('id','=', session()->get('loginId'))->first();
        }
        $post = Post::orderBy('id','desc')->paginate(10);
        return view('admin/index',compact('post','LogIn'));
    }

    public function create(){
        $LogIn = array();
        if(session()->has('loginId')){
            $LogIn =  Admin::where('id','=', session()->get('loginId'))->first();
        }
        $catagory = Category::all();
        return view('admin/add-post',compact('catagory','LogIn'));
    }

    public function store(Request $request){
        $request->validate([
            'post_title' => 'required',
            'postdesc' => 'required',
            'category' => 'required',
            'username' => 'required',
            'fileToUpload' => 'required',
        ]);

        $post = new Post;
        $post->title = $request->input('post_title');
        $post->description = $request->input('postdesc');
        $post->category = $request->input('category');
        $post->date = date('d M, Y');
        $post->admin = $request->input('username');
        if($request->hasFile('fileToUpload'))
        {
            $file = $request->file('fileToUpload');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('images/', $filename);
            $post->post_img = $filename;
        }
        $post->save();
        return redirect('admin/index')->with('success','Post Posted Successfully');
    }

    public function edit($id)
    {
        $LogIn = array();
        if(session()->has('loginId')){
            $LogIn =  Admin::where('id','=', session()->get('loginId'))->first();
        }
        $post = Post::find($id);
        $catagory = Category::all();
        return view('admin/update-post',compact('post','catagory','LogIn'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'post_title' => 'required',
        //     'postdesc' => 'required',
        // ]);

        $post = Post::find($id);

        $post->title = $request->input('post_title');
        $post->description = $request->input('postdesc');
        $post->category = $request->input('category');
        if($request->hasFile('post_img'))
        {
            $destination = 'images/'.$post->post_img;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('post_img');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('images/', $filename);
            $post->post_img = $filename;
        }
        $post->update();
        return redirect('admin/index')->with('update','Post Updated Successfully');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $destination = 'images/'.$post->post_img;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $post->delete();
        return redirect('admin/index')->with('delete','Post Deleted Successfully');
    }
    
}

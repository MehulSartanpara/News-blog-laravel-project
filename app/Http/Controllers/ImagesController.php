<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Admin;

class ImagesController extends Controller
{
    public function index()
    {
        $LogIn = array();
        if(session()->has('loginId')){
            $LogIn =  Admin::where('id','=', session()->get('loginId'))->first();
        }
        $images = Image::all();
        return view('admin/images',compact('images','LogIn'));
    }

    public function create()
    {
        $LogIn = array();
        if(session()->has('loginId')){
            $LogIn =  Admin::where('id','=', session()->get('loginId'))->first();
        }
        $images = Image::all();
        return view('admin/add-images',compact('LogIn'));
    }

    public function store(Request $request)
    {
        $images = new Image();
        
        if($request->hasFile('image'))
        {
            foreach($images as $image){
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('images/', $filename);
                $images->images = $filename;
                $images->save();
            }
        }
        return redirect('admin/images')->with('success','Images Uploaded Successfully');
    } 

}

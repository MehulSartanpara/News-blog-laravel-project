<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('admin/images',compact('images'));
    }

    public function create()
    {
        return view('admin/add-images');
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

<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Admin;
class FileUpload extends Controller
{
  // public function createForm(){
  //   $LogIn = array();
  //   if(session()->has('loginId')){
  //       $LogIn =  Admin::where('id','=', session()->get('loginId'))->first();
  //   } 
  //   return view('admin/images',compact('LogIn'));
  // }

  public function index(){
    $LogIn = array();
    if(session()->has('loginId')){
        $LogIn =  Admin::where('id','=', session()->get('loginId'))->first();
    } 
    $images = Image::all();
    return view('admin/images',compact('LogIn','images'));
  }
  public function createForm(){
    $LogIn = array();
    if(session()->has('loginId')){
        $LogIn =  Admin::where('id','=', session()->get('loginId'))->first();
    } 
    return view('admin/add-images',compact('LogIn'));
  }

  public function fileUpload(Request $req){
    $req->validate([
      'imageFile' => 'required',
      'imageFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
    ]);
    if($req->hasfile('imageFile')) {
        foreach($req->file('imageFile') as $file)
        {
            $name = $file->getClientOriginalName();
            $file->move(public_path().'/uploads/', $name);  
            $imgData[] = $name;  
        }
        $fileModal = new Image();
        $fileModal->name = json_encode($imgData);
        $fileModal->image_path = json_encode($imgData);
        
       
        $fileModal->save();
       return redirect('admin/images')->with('success', 'File has successfully uploaded!');
    }
  }
}

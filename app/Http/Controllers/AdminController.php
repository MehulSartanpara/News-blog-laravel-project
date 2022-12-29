<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

use Session;

use function PHPUnit\Framework\returnSelf;


class AdminController extends Controller
{
    function index(){     
        $LogIn = array();
        if(session()->has('loginId')){
            $LogIn =  Admin::where('id','=', session()->get('loginId'))->first();
        } 
        $admin = Admin::paginate(5);
        return view('admin/admins',compact('admin','LogIn'));
    }

    function create(){
        $LogIn = array();
        if(session()->has('loginId')){
            $LogIn =  Admin::where('id','=', session()->get('loginId'))->first();
        } 
        return view('admin/add-admin',compact('LogIn'));
    }
    function store(Request $request){
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required|unique:admins',
            'email' => 'required|unique:admins|email',
            'password' => 'required',
            'role' => 'required',
            'user_img' => 'required',
        ]);
        $admin = new Admin;
        $admin->first_name = $request->input('fname');
        $admin->last_name = $request->input('lname');
        $admin->username = $request->input('username');
        $admin->email = $request->input('email');
        $admin->password = $request->input('password');
        $admin->role = $request->input('role');
        if($request->hasFile('user_img'))
        {
            $file = $request->file('user_img');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('images/', $filename);
            $admin->user_img = $filename;
        }
        $admin->save();
        return redirect('admin/admins')->with('success','Admin Added Successfully');
    }

    function update($id)
    {
        $LogIn = array();
        if(session()->has('loginId')){
            $LogIn =  Admin::where('id','=', session()->get('loginId'))->first();
        } 
        $admin = Admin::find($id);
        return view('admin/update-admin',compact('admin','LogIn'));
    }

    function edit(Request $request, $id)
    {
        $admin = Admin::find($id);

        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $admin->first_name = $request->input('fname');
        $admin->last_name = $request->input('lname');
        $admin->username = $request->input('username');
        $admin->email = $request->input('email');
        $admin->password = $request->input('password');
        $admin->role = $request->input('role');
        if($request->hasFile('user_img'))
        {
            $destination = 'images/'.$admin->user_img;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('user_img');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('images/', $filename);
            $admin->user_img = $filename;
        }
        $admin->update();
        return redirect('admin/admins')->with('update','Admin Update Successfully');
    }

    function destroy($id)
    {
        $admin = Admin::find($id);
        $destination = 'images/'.$admin->user_img;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $admin->delete();
        return redirect('admin/admins')->with('delete','Admin Deleted Successfully');;
    }

    function loginreq()
    {
        return view('admin/login');
    }
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin =  Admin::where('email','=', $request->email)->first();
        if($admin){
            if ($request->input('password') == $admin->password)
            {
                $request->session()->put('loginId', $admin->id);
                return redirect('admin/index');
            }else{
                return redirect('admin')->with('error','Password is not Matches.');
            }
        }else{
            return redirect('admin')->with('error','Email is not registered.');
        }
        // $admin =  Admin::where('email', $req->input('email'))->get();
        // if($admin[0]->password == $req->input('password'))
        // {
        //     $req->session()->put('id ', $admin[0]->id);
        //     $req->session()->put('username', $admin[0]->username);
        //     $req->session()->put('user_img', $admin[0]->user_img);
        //     $req->session()->put('first_name', $admin[0]->first_name);
        //     return redirect('admin/index');
        // }
        // else{
        //     return redirect('admin')->with('error','Email or Password Does Not Match');
        // }
    }

    function logout()
    {
        if(session()->has('loginId')){
            session()->pull('loginId');
            return redirect('admin');
        }
    }

}

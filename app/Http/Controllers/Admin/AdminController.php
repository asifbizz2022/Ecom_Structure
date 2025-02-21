<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;

class AdminController extends Controller
{
    public function login_page(){
        return view('Admin.login');
    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required|min:3'
        ]);

        $email = $request->email;
        $password = $request->password;

        $auth = Auth::guard('admin')->attempt([
            'email'=>$email,
            'password'=>$password,
        ]);

        if($auth){
            return redirect('/admin/home');
        } else {
            return back()->with('message', 'Invalid Credentials');
        }

    }
    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:3|confirmed'
        ]);

        $name = $request->name;
        $email = $request->email;
        $password = bcrypt($request->password);

        $result = DB::table('users')->insert([
            'name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'contact'=>1234567890,
        ]);

        if($result){
            return back()->with('message', 'Registration Successfull');
        } else {
            return back()->with('message', 'error');
        }
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin/login/page');
    }
}

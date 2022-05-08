<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\SendMail;
use App\Models\Admin;
use Auth;
use Hash;
use Mail;
use URL;

class Admins extends Controller
{



    public function login(){
        return view('Admin/layouts/login');
    }





    public function lang($lang){
        \App::setLocale($lang);
        session()->put('locale', $lang);
  
        return redirect()->back();
    }





    public function doLogin(Request $request){
        $validated = $request->validate([
            "email" => "required|email|max:100",
            "password" => "required|max:200",
        ]);
       if(Auth::guard('admin')->attempt($validated)){
            return redirect('admin/');
        }else{
            return redirect('admin/login');
        }
    }





    public function dashboard(){
        return view('Admin/layouts/dashboard');
    }





    public function adminInfo(){
        $admins = Admin::get();
        return view('Admin/Admin/adminInfo',compact('admins'));
    }





    public function viewCreateAdmin($id=null){
         if(empty($id)){
            return view('Admin/Admin/viewCreateAdmin');
        }else{
            $admin = Admin::find($id);
            return view('Admin/Admin/viewCreateAdmin',compact('admin'));
        }   
    }





    public function createAdmin(Request $request){
        $validated = $request->validate([
            "name" => "required|max:100",
            'email' => 'required|unique:admins,email,'.$request->id.'|max:100',
            'password' => 'required|max:100',
            'confirmPassword' => 'same:password',
        ]);
       
        $data = $request->except('_token','confirmPassword');
        $data['password'] = Hash::make($data['password']);

        if(empty($data['id'])){
            Admin::create($data);
        }else{
            Admin::where('id',$data['id'])->update($data);
        }

        session()->flash('success','Done');
        return back();
    }





    public function deleteAdmin($id){
        Admin::where('id',$id)->delete();
        session()->flash('success','Done');
        return back();
    }






    public function logOut(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }





    public function forgetPass(){
         return view('Admin/layouts/forgetPass');
    }





    public function sendMail(Request $request){
        $validated = $request->validate([
            'email' => 'required|max:100',
        ]);
        $admin = Admin::where('email',$request->email)->first();
        if(!empty($admin)){
            $data['url']= URL::to('verify_code_page');
            $data['message']='please check the link';
            $data['verify_code'] = rand(1000,9999);

            $admin->verify_code = $data['verify_code'];
            $admin->save();
            $email = new SendMail($data);
            Mail::to($validated['email'])->send($email);

            session()->flash('success','email sent');
            return redirect('admin/verify_code_page');
        }else{
            session()->flash('danger','email not found');
            return back();
        }
    }





    public function verify_code_page(){
        return view('Admin/layouts/verify_code_page');
    }





    public function check_verify_code(Request $request){
        $validated = $request->validate([
            'verify_code' => 'required|integer|max:9999',
        ]);
        $admin = Admin::where('verify_code',$request->verify_code)->first();
        if(!empty($admin)){
            session()->flash('success','the code is correct');
            return redirect('admin/reset_password/'.$admin->email);
        }else{
            session()->flash('danger','the code does not match');
            return back();
        }
    }




    public function reset_password($email){
        return view('Admin/layouts/reset_password',compact('email'));
    }




    public function doResetPass(Request $request){
        $validated = $request->validate([
            "email" => "required|email|max:100",
            "password" => "required|max:200",
            "confirmPassword" => "required|same:password|max:200",
        ]);
        $admin = Admin::where('email',$request->email)->first();
        if(!empty($admin)){
            $pass = Hash::make($request->password);
            $admin->password = $pass;
            $admin->verify_code = null;
            $admin->save();
            session()->flash('success','now you can login');
            return redirect('admin/login');
        }else{
            session()->flash('danger','email not found');
            return back();
        }
    }




}

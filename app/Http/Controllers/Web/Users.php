<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sub_category;
use App\Mail\SendMail;
use Hash;
use Session;
use Auth;
use Mail;
use URL;
use File;

class Users extends Controller
{


    public function login(){
        return view('General/Home/login');
    }


    

    public function register(){
        return view('General/Home/register');
    }





    public function doRegister(Request $request){
        $validated = $request->validate([
            "name" => "required|max:100",
            "email" => "required|email|max:100",
            "password" => "required|max:200",
            "confirm_password" => "required|same:password|max:200",
        ]);

        unset($validated['confirm_password']);
        $validated['password'] = Hash::make($validated['password']);

        $remember_token = Session::get('remember_token');
        User::where('remember_token',$remember_token)->update($validated);

        session()->flash('success','registerd successfully');
        return redirect('login');

    }





    public function doLogin(Request $request){
        $validated = $request->validate([
            "email" => "required|email|max:100",
            "password" => "required|max:200",
        ]);

        if(Auth::attempt($validated)){
            return redirect('/');
        }else{
            return redirect('login');
        }
    }





    public function forgetPass(){
        return view('General/Home/forgetPass');
    }




    public function sendMail(Request $request){
        $validated = $request->validate([
            'email' => 'required|max:100',
        ]);
        $user = User::where('email',$request->email)->first();
        if(!empty($user)){
            $data['url']= URL::to('verify_code_page');
            $data['message']='please check the link';
            $data['verify_code'] = rand(1000,9999);

            $user->verify_code = $data['verify_code'];
            $user->save();
            $email = new SendMail($data);
            Mail::to($validated['email'])->send($email);

            session()->flash('success','email sent');
            return redirect('verify_code_page');
        }else{
            session()->flash('danger','email not found');
            return back();
        }
    }




    public function verify_code_page(){
        return view('General/Home/verify_code_page');
    }




    public function check_verify_code(Request $request){
        $validated = $request->validate([
            'verify_code' => 'required|max:9999',
        ]);

        $user = User::where('verify_code',$request->verify_code)->first();

        if(!empty($user)){
            session()->flash('success','you can change your password now');
            return redirect('changePass/'.$user->email);
        }

        session()->flash('danger','verify code is error');
        return back();
    }




    public function changePass($email){
        return view('General/Home/changePass',compact('email'));
    }




    public function doResetPass(Request $request){
        $validated = $request->validate([
            "password" => "required|max:200",
            "confirm_password" => "required|same:password|max:200",
        ]);
        $user = User::where('email',$request->email)->first();
        if(!empty($user)){
            $newPass = Hash::make($validated['password']);
            $user->password = $newPass;
            $user->verify_code = null;
            $user->save();

            session()->flash('success','password changed');
            return redirect('login');
        }

        session()->flash('danger','err');
        return redirect('forgetPass');
    }





    public function profile(){
        $sub_categories = Sub_category::get();
        return view('General/Profile/profile',compact('sub_categories'));
    }




    public function updateProfile(Request $request){
        $validated = $request->validate([
            "name" => "required|max:100",
            "email" => "required|max:100|email|unique:users,email,".Auth::id(),
            "phone" => "required|unique:users,phone,".Auth::id(),
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4048',
            'ship_address' => 'max:255',
        ]);

        if ($request->hasFile('image')) {
            
            $destinationPath = public_path('uploads/users/');

            if(!empty(Auth::user()->image) && Auth::user()->image != 'defaultLogo.png') {
                File::delete($destinationPath . Auth::user()->image);
            }

            $image = $request->file('image');
            $validated['image'] = rand(11111, 99999).'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $validated['image']);
        }

        User::where('id',Auth::id())->update($validated);

        session()->flash('success','profile updated');
        return back();


    }





    public function logout(){
        $user_id = Auth::id();
        Auth::logout();
        $remember_token = User::find($user_id)->remember_token;
        Session::put('remember_token',$remember_token);
        session()->flash('success','logged out');
        return redirect('login');
    }





}

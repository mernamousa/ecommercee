<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use  App\Mail\SendUserMail;
use Validator;
use Auth;
use Str;
use Hash;
use File;
use Mail;
class Users extends Controller
{
  
    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            "name" => "required|max:100",
            "phone" => "required|max:100",
            "email" => "required|email|max:100",
            "password" => "required|max:200",
            "confirmPassword" => "required|same:password|max:200",
        ]);
 
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray(); //assuitve array with keys
            $errors = array_values($errors); //index array without keys
           
            $data['status'] = false;
            $data['errors'] = $errors[0][0];
            return $data;
        }


        $vall =$validator->validated();
        $vall['password'] =Hash::make($request->password);

        $user = User::create($vall);

        $data['status'] = true;
        $data['user'] = $user ;
        
        return $data;
    }

    public function doLogin(Request $request){
        $validator = Validator::make($request->all(), [
            "email" => "required|email|max:100",
            "password" => "required|max:200",
        ]);
 
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray(); //assuitve array with keys
            $errors = array_values($errors); //index array without keys
           
            $data['status'] = false;
            $data['errors'] = $errors[0][0];
            return $data;
        }
        $user = User::where('email',$request->email)->first();

        if($user && Hash::check($request->password, $user->password)){

            $user->api_token = Str::random(50);
            $user->save();

            $data['status'] = true;
            $data['user'] = $user;
        }else{
            $data['status'] = false;
            $data['message'] = 'sorry the user doesnot exist';
        }
        return $data;

    }





    public function profile(){

       $user = Auth::guard('api')->user();
       $user->image = url("Admin_uploads/users/".$user->image);
       $data['status']= true;
       $data['user']= $user;
       return $data;
    }





    public function updateProfile(Request $request){

        $user = Auth::guard('api')->user();
         $validator = Validator::make($request->all(), [
            "name" => "required|max:100",
            "phone" => "required|unique:users,phone,".$user->id."|max:100",
            "email" => "required|unique:admins,email,".$user->id."|max:100",
            "image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);
 
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray(); //assuitve array with keys
            $errors = array_values($errors); //index array without keys
           
            $data['status'] = false;
            $data['errors'] = $errors[0][0];
            return $data;
        }

        $valll = $validator->validated();


        if ($request->hasFile('image')) {

            $destinationPath = public_path('Admin_uploads/users/');
            File::delete($destinationPath . $user->image);
            $image = $request->file('image');
            $valll['image'] = rand(11111, 99999).'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $valll['image']);
        }

        User::where('id',$user->id)->update($valll);
        $updateduser=User::where('id',$user->id)->first();
        $updateduser->image = url("Admin_uploads/users/".$updateduser->image);

        $data['status']= true;
        $data['user']= $updateduser;

        return $data;   

    }




    public function changePassword(Request $request){
        $user = Auth::guard('api')->user();
         $validator = Validator::make($request->all(), [
            "password" => "required|max:100",
            "confirmPassword" => "required|same:password|max:100",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray(); //assuitve array with keys
            $errors = array_values($errors); //index array without keys
           
            $data['status'] = false;
            $data['errors'] = $errors[0][0];
            return $data;
        }

        User::where('id',$user->id)->update([
            'password'=>Hash::make($request->password),
        ]);

        $data['status'] = true;
        $data['message'] = 'password changed';
        
        return $data;

    }

   


    public function logOut(){
        $user = Auth::guard('api')->user();
        $user->api_token = null;
        $user->save();

        $data['status']= true;
        $data['message']= 'the user logged out';
        return $data;

    }




    public function sendMail(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:100',
        ]);

        $user = User::where('email',$request->email)->first();
        $vall = $validator->validated();

        if(!empty($user)){
            $data['message']='plz copy code to reset pass page';
            $data['verify_code'] = rand(1000,9999);

            $user->verify_code = $data['verify_code'];
            $user->save();
            
            $email = new SendUserMail($data);
            Mail::to($vall['email'])->send($email);

            $info['status'] = true;
            $info['message'] = 'check your email ';
            return $info;
        }else{
            
            $info['status'] = false;
            $info['message'] = 'email not found';
            return $info;
        }
    }





    public function doResetPass(Request $request){
        $validator = Validator::make($request->all(), [
            'verify_code' => 'required|integer|max:9999',
            "email" => "required|email|max:100",
            "password" => "required|max:200",
            "confirmPassword" => "required|same:password|max:200",
        ]);
        $user = user::where('verify_code',$request->verify_code)->where('email',$request->email)->first();

        if(!empty($user)){
            $pass = Hash::make($request->password);
            $user->password = $pass;
            $user->verify_code = null;
            $user->save();

        $info['status'] = true;
            $info['message'] = ' your password changed ';
            return $info;
        }else{
            
            $info['status'] = false;
            $info['message'] = 'email not found';
            return $info;
        }
    }







}

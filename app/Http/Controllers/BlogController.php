<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class BlogController extends Controller
{
     public function index()
    {
        return view('home');
    }
    public function goprofile()
    {
        return view('admin_profile');
    }

    protected $rules=array(
    	'name'=>'required|max:255',
    	'password'=>'required|min:6|confirmed',
    	'password_confirmation'=>'sometimes|required_with:password',
    	);

   public function goprofilepost(Request $request,$name)
    {
  $userid=DB::Table('users')->select('id')->where('name','=',$name)->get();
 $this->rules['email']='required|email|unique:users,email,'.$userid[0]->id;
 $validate=Validator::make($request->all(),$this->rules);

 if($validate->passes()){
 	 $user=\App\User::find($userid[0]->id);
 	 $user->name=$request['name'];
 	 $user->email=$request['email'];
 	 $user->password=bcrypt($request['password']);
 	 $user->save();
 	 return redirect('/dashboard/'.$name.'/profile')->with('success','Profile Updated');
 }else{
 	return redirect('/dashboard/'.$name.'/profile')->with('error','Profile Update Failed');
 }
    	// dd($name);
        // return view('admin_profile');
    }
}


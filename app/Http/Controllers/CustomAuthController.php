<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class CustomAuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }
    public function register(){
        return view("auth.register");
    }
    public function registerUser(Request $request){
        
        $request->validate([
            'name'=>"required",
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|max:12'
        ]);
        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password= Hash::make($request->password);
        $res = $user->save();
        if($res){
            return back()->with('success', "you have registered successfuly");

        }else{
            return back()->with('fail', "you have not registered");
        }
    }
    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:12'
        ]);
        $user =  User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect('dashboard');
            }else{
                return back()->with('fail','password notmatches.');
            }
        }else{
            return back()->with('fail','this email is not registered.');
        }
    }
    public function dashboard(){
        return view("dashboard");
    }
}
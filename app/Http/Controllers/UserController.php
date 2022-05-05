<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class UserController extends Controller
{
    //
    function login(Request $req)
    {
        $user = User::where(['email'=>$req->email])->first();
        
        if(empty($user) || !Hash::check($req->password, $user->password))
        {
            return "Invalid Username or Password";
        }
        else
        {
            $req->session()->put('user', $user);
            return redirect()->route('home');
        }
    }

    public function logout(){
        Session::forget('user');

        return redirect()->route('signin');
    }

    public function register(Request $request){

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        return redirect()->route('signin');
    }
}

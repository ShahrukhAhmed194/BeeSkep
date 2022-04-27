<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
            return redirect('/home');
        }
    }
}

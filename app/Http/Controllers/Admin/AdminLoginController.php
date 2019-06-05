<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;

class AdminLoginController extends Controller
{

    public function getLogin()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|max:10|min:4',
        ]);

        if ($validate->fails()) {
            return  redirect()->back()->withErrors($validate);
        } 
        $remember = $request->remember;
        $login = ['email' => $request->email, 'password' => $request->password, 'role' => User::adminRole];
        if (Auth::attempt($login, $remember ? true : false)){
            return redirect()->route('home')->with('status', "Wellcome to BLog1 !");
        }
        return redirect()->back()->with('erorr', 'Email hoặc mật khẩu không chính xác !');
    }
    
    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Validator;
use Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function getLogin()
    {
        $categories = Category::all();
        return view('modules.login', compact('categories'));
    }

    public function postLogin(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|max:10|min:4',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        } 
        $remember = $request->remember;
        $login = ['email' => $request->email, 'password' => $request->password];
        if (Auth::attempt($login, $remember ? true : false)){
            if (Auth::user()->action) {
                Auth::logout();
                return redirect()->route('userLogin')->with('error', 'Tài khoản đã bị vô hiệu hóa !');
            }
            return redirect()->route('userHome')->with('status', "Wellcome to BLog1 !");
        }
        return redirect()->back()->with('error', 'Email hoặc mật khẩu không chính xác !');
    }
    
    public function Logout()
    {
        Auth::logout();
        return redirect()->route('userLogin');
    }

    public function create()
    {
        $categories = Category::all();
        return view('modules.register', compact('categories'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name'=>'required|max:15|min:4',
            'email' => 'required|email|unique:users,email|max:25',
            'password'=>'required|max:10|min:4|',
            'password_confirm' => 'required_with:password|same:password|min:4',
            'img' => 'mimes:jpeg,gif,png|file|max:3072',
        ]);
        if ($validate->fails()) {
          return redirect()->back()->withErrors($validate);
        } else {
            $user = new User;
            $user->name = $request->name;
            $user->role = $request->role;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $file = $request->img;
            $file->move("uploads", $file->getClientOriginalName());
            $upload = "uploads/". $file->getClientOriginalName();
            $user->img = $upload;
            $user->save();
            
            return redirect()->route('userLogin')->with('status', 'Đăng ký tài khoản thành công!!');
        }
    }

}

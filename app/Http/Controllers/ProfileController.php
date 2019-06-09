<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;

class ProfileController extends Controller
{

    public function show($id){
        $categories = Category::all();
        $user = User::find($id);
        return view('modules.profile', compact('user', 'categories'));
    }

    public function edit(Request $request, $id){
        $categories = Category::all();
        $user = User::find($id);
        return view('modules.edit-profile', compact('user', 'categories'));
    }

    public function update(Request $request, User $user, $id)
    {
        if ($request->password_new == "" && $request->password == "" 
        && $request->password_confirmation == "") {
            $validate = Validator::make($request->all(), [
                'name' =>'required|max:10|min:4',
                'email' => 'required|email',
                'img' => 'mimes:jpeg,gif,png|file|max:3072',
                ]);
            if ($validate->fails()) {
                return redirect()->back()->withErrors($validate);
            } 
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $file = $request->img;
            if (file_exists($file)) {
                $file->move("uploads", $file->getClientOriginalName());
                $upload = "uploads/". $file->getClientOriginalName();
                $user->img = $upload;
            }
            $user->save();
            
            return redirect()->route('userProfile', ['user' => $user] );
        }
        if (!Hash::check($request->password, Auth::user()->password)) {
            return redirect()->back()->withErrors('Mật khẩu  không chính xác !!');
        }
        $validate = Validator::make($request->all(), [
            'name' =>'required|max:10|min:4',
            'email' => 'required|email',
            'password_new' => 'required|max:10|min:4',
            'password_confirmation' => 'required_with:password_new|same:password_new|min:4',
            'img' => 'mimes:jpeg,gif,png|file|max:3072',
            ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        } 
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password_new);
        $file = $request->img;
        if (file_exists($file)) {
            $file->move("uploads", $file->getClientOriginalName());
            $upload = "uploads/". $file->getClientOriginalName();
            $user->img = $upload;
        }
        $user->save();
                
        return redirect()->route('userProfile', $id )->with('status', 'Update profile sussces !');
    }
    
}


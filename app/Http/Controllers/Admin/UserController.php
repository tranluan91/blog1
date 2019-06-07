<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.list');
    }

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
    public function create()
    {
        return view('admin.user.add');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name'=>'required|max:15|min:4',
            'email' => 'required|email|unique:users,email',
            'password'=>'required|max:25|min:4|',
            'img' => 'required|mimes:jpeg,gif,png|file|max:3072',
        ]);
        if ($validate->fails()) {
          return redirect()->back()->withErrors($validate);
        } else {
            $user = new User;
            $user->name = $request->name;
            $user->role = $request->role;
            $user->action = 0;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $file = $request->img;

            if (file_exists($file)) {
                $file->move("uploads", $file->getClientOriginalName());
                $upload = "uploads/". $file->getClientOriginalName();
                $user->img = $request->img;
            }
            return redirect()->route('list-user');
        }
    }

    public function show(User $user)
    {
        $user = User::paginate(5);
        return  view('admin.user.list', compact('user'));
    }

    public function edit(User $user, $id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user, $id)
    {
        if ($request->img){
            $validate = Validator::make($request->all(), [
                'name'=>'required|max:15|min:4',
                'email' => 'required|email',
                'img' => 'required|mimes:jpeg,gif,png|file|max:3072',
            ]);
        } else {
            $validate = Validator::make($request->all(), [
                'name'=>'required|max:15|min:4',
                'email' => 'required|email',
            ]);
        }
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        } 
        $user = User::find($id);
        $user->name = $request->name;
        $user->role = $request->role;
        $user->action = $request->action;
        $user->email = $request->email;
        $file=$request->img;
        if (file_exists($file)) {
            $file->move("uploads", $file->getClientOriginalName());
            $upload = "uploads/". $file->getClientOriginalName();
            $user->img = $upload;
        }
        $user->save();
        return redirect()->route('list-user');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('list-user');
    }

}

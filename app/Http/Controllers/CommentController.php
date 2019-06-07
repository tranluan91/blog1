<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;

class CommentController extends Controller
{
    public function guestComment(Request $request, $id)
    {
        $comment = new Comment ;
        if (!Auth::check()) {
            $validate = Validator::make($request->all(), [
                'name'=>'required|max:10|min:4',
                'email' => 'required|email',
                'content' => 'required|min:4|max:30',
            ]);
            if ($validate->fails()) {
                return redirect()->back()->withErrors($validate);
            }
            $comment->name = $request->name;
            $comment->user_id = Comment::guest_id;
        } else {
            $comment->user_id = Auth::user()->id;
            $comment ->name = Auth::user()->name;
            if (Auth::user()->id == Post::find($id)->user_id)
            {
                $comment->status = Comment::show;
            }
        }
        if ($request->parentId) {
            $comment->parent_id = $request->parentId;
        }
        $comment->content = $request->content;
        $comment->post_id = $id;
        $comment->save();
        if ($comment->status) {
            return redirect()->back()->with('status', 'Comment đăng thành công' );
        } else {
            return redirect()->back()->with('status', 'Đang chờ xét duyệt' );
        }
    }

    public function showComment($id)
    {
        $comment = Comment::find($id);
        $comment->status = Comment::show;
        $comment->save();
        return redirect()->back()->with('status', 'Coment đã được hiển thị');
    }

    public function destroy($id)
    {
        Comment::destroy($id);
        return redirect()->back()->with('status', 'Coment đã xóa');
    }

}

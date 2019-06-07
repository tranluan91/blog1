<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return abort('404');
        }
        $comments = $post->Comments()->paginate(10);
        return view('admin.comment.list', ['comments' => $comments, 'post' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $post = Post::find($id);
        $user = User::find(Auth::user()->id);
        return view('admin.comment.add', compact('post', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'content' => 'required|max:300|min:5'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }
        $comment = new Comment;
        $comment->content = $request->content;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $id;
        $comment->status = Comment::show;
        $comment->save();

        return redirect()->route('list-comment', $id)->with('status', 'Thêm mới bản ghi thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    { 
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment, $id)
    {
        $comment = Comment::find($id);
        $comment->status = Comment::show;
        $comment->save();
        return redirect()->back()->with('status', "Comment đã được duyệt !!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment, $id)
    {
        Comment::destroy($id);
        return redirect()->back()->with('status', "Xóa bản ghi thành công !!");
    }
}

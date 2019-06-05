<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(15);
        return view('admin.post.list', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('admin.post.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:posts,name|min:4|max:50',
            'tags' => 'required',
            'content' => 'required|min:50|max:1000'
        ]);
        if ($validate->fails()) {
            return redirect()->route('add-post')->withErrors($validate);
        }
        $post = new Post;
        $post->category_id = $request->category_id;
        $post->content = $request->content;
        $post->name = $request->name;
        $post->user_id = Auth::user()->id;
        $file = $request->img; 
        if (file_exists($file)) {
            if ( $file->getMimeType() == "image/jpeg" && $file->getMimeType("image/png") 
            && $file->getMimeType("image/gif") ){ 
                if ($file->getSize() < 5000000) {
                    $file->move("uploads", $file->getClientOriginalName());
                    $upload = "uploads/".$file->getClientOriginalName();
                    $post->img = $upload;
                    $post->save();
                    $tags = $request->tags;
                    $tag = strpos($tags, ';');
                    if ($tag) {
                        $tagsNames = explode(';', $tags);
                        foreach ($tagsNames as $tagsName) {
                            $name = $tagsName;
                            $tag = Tag::where('name', '=', $name)->first();
                            if (!$tag){
                                $tag = new Tag;
                                $tag->name = $name;
                                $tag->save();
                            }
                            $post->tags()->attach($tag->id);
                        }
                    } else {
                        $tag = Tag::where('name', '=', $name)->get()->first();
                        if (!$tag) {
                            $tag = new Tag;
                            $tag->name = $name;
                            $tag->save();
                        }
                        $post->tags()->attach($tag->id);
                    }
                    
                } else {
                    echo'upload file failed';
                }
            }
        }

        return redirect()->route('list-post')->with('status','Thêm mới bài viết thành công !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, $id)
    {
        $categories = Category::pluck('name', 'id');
        $post = Post::find($id);
        $name = "";
        $i = 0;
        foreach ($post->tags as $tag) {
            $i++;
            $tag->name;
            if ($i==1) {
                $name = $tag->name;
            } else {
                $name .= ";".$tag->name ;
            }
        }

        return view('admin.post.edit',compact('categories','post','name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post, $id)
    {    
        $validate = Validator::make($request->all(),[
            'name' => 'required|min:4|max:50',
            'tags' => 'required',
            'content' => 'required|min:50|max:1000'
        ]);
        if ($validate->fails()) {
            return redirect()->route('add-post')->withErrors($validate);
        }
        $post = Post::find($id);
        $post->category_id = $request->category_id;
        $post->content = $request->content;
        $post->name = $request->name;
        $post->user_id = 1;
        $file = $request->img;
        $upload = $post->img;
        if (file_exists($file)) {
            if ($file->getMimeType() == "image/jpeg" && $file->getMimeType("image/png") 
            && $file->getMimeType("image/gif")){ 
                if ($file->getSize() < 5000000) {
                    $file->move("uploads", $file->getClientOriginalName());
                    $upload = "uploads/".$file->getClientOriginalName();
                    $post->img = $upload;
                } else {
                    echo'upload file failed';
                }
            }
        } else {
            $post->img = $upload;
        }
        $post->save();

        $tags = $request->tags;
        $tag = strpos($tags, ';');
        if ($tag) {
            $tagsNames = explode(';',$tags);
            foreach ($tagsNames as $tagsName) {
                $name = $tagsName;
                $tag = Tag::where('name', '=', $name)->first();
                if (!$tag) {
                    $tag = new Tag;
                    $tag->name = $name;
                    $tag->save();
                }
                $tagId[] = $tag->id;
            }
        } else {
            $tag = Tag::where('name', '=', $tags)->first();
            if (!$tag) {
                $tag = new Tag;
                $tag->name = $tags;
                $tag->save();
            } 
            $tagId[] = $tag->id;
        }
        $post->tags()->sync($tagId);

        return redirect()->route('list-post')->with('status','Sửa bài viết thành công !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, $id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        Post::destroy($id);
        
        return redirect()->back()->with('status', 'Xóa bản ghi thành công !!');   
    }
}

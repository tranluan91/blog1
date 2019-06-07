<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Validator;
use Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->where('status', Post::show)->paginate(6);
        $categories = Category::all()->where('status', Category::show);
        $tags = Tag::all()->where('status', Tag::show);
        $postLastests  = Post::where('status', Post::show)->orderBy('id', 'desc')->take(2)->get();
        $postRamdom = Post::where('status', Post::show)->inRandomOrder()->take(2)->get();
        return view('modules.home', compact('posts', 'postLastests', 'postRamdom', 'tags', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->where('status', Category::show);
        $categoryName = Category::where('status', Category::show)->pluck('name', 'id');
        return view('modules.addPost', compact('categories', 'categoryName')); 
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
            'content' => 'required|min:50|max:3000',
            'img' => 'mimes:jpeg,gif,png|file|max:3072',
        ]);
        if ($validate->fails()) {
            return redirect()->route('addPost')->withErrors($validate);
        }
        $post = new Post;
        $post->category_id = $request->category_id;
        $post->content = $request->content;
        $post->name = $request->name;
        $post->user_id = Auth::user()->id;
        $file = $request->img; 
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
                if (!$tag) {
                    $tag = new Tag;
                    $tag->name = $name;
                    $tag->save();
                }
                $post->tags()->attach($tag->id);
            }
        } else {
            $tag = Tag::where('name', '=', $tags)->get()->first();
            if (!$tag) {
                $tag = new Tag;
                $tag->name = $tags;
                $tag->save();
            }
        $post->tags()->attach($tag->id);
        }
        $categories = Category::all()->where('status', Category::show);
                  
        return redirect()->route('listPost', compact('categories'))->with('status', 'Thêm mới bài viết thành công !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $user = $post->user()->first();
        $comments = $post->comments()->where('status', 1)->get();
        $countComment = $comments->count();
        $categories = Category::all()->where('status', Category::show);
        $tags = Tag::all()->where('status', Tag::show);
        $tagsPosts = $post->tags()->get();
        $commentsHide = $post->comments()->where('status', 0)->get();
        $postLastests  = Post::where('status', Post::show)->orderBy('id', 'desc')->take(2)->get();
        $postRamdom = Post::where('status', Post::show)->inRandomOrder()->take(2)->get();
        return view('modules.blogDetail', compact('post', 'categories', 'tagsPosts', 'user', 'comments', 'countComment', 
        'commentsHide', 'tags', 'postLastests', 'postRamdom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all()->where('status', Category::show);
        $categoryName = Category::where('status', Category::show)->pluck('name', 'id');
        $post = Post::find($id);
        $name = "";
        $i = 0;
        foreach ($post->tags as $tag) {
            $i++;
            $tag->name;
            if ($i==1) {
                $name = $tag->name;
            } else {
                $name .= ";". $tag->name ;
            }
        }

        return view('modules.editPost', compact('categories', 'post', 'name', 'categoriesName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|min:4|max:50',
            'tags' => 'required',
            'content' => 'required|min:50|max:3000',
            'img' => 'mimes:jpeg,gif,png|file|max:3072',
        ]);
        if ($validate->fails()) {
            return redirect()->route('add-post')->withErrors($validate);
        }
        $post = Post::find($id);
        $post->category_id = $request->category_id;
        $post->content = $request->content;
        $post->name = $request->name;
        $post->user_id = Auth::user()->id;
        $file = $request->img;
        if (file_exists($file)) {
            $file->move("uploads", $file->getClientOriginalName());
            $upload = "uploads/". $file->getClientOriginalName();
            $post->img = $upload;
        }
        $post->save();
        $tags = $request->tags;
        $tag = strpos($tags, ';');
        if ($tag) {
            $tagsNames = explode(';', $tags);
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
        $id = Auth::user()->id;
        return redirect()->route('listPost')->with('status', 'Sửa bài viết thành công !!');
    }

    public function getByCategory($id)
    {
        if (!Category::find($id)) {
            return abort('404');
        }
        $posts = Post::where('category_id', $id)->paginate(15);
        $categories = Category::all()->where('status', Category::show);
        $tags = Tag::all()->where('status', Tag::show);
        $postLastests  = Post::where('status', Post::show)->orderBy('id', 'desc')->take(2)->get();
        $postRamdom = Post::where('status', Post::show)->inRandomOrder()->take(2)->get();
        
        return view('modules.home', compact('posts', 'postLastests', 'postRamdom', 'tags', 'categories'));
    }

    public function getByTag($id)
    {
        if (!Tag::find($id)) {
            return abort('404');
        }
        $posts = Tag::find($id)->posts()->paginate(10);
        $categories = Category::all()->where('status', Category::show);
        $tags = Tag::all()->where('status', Tag::show);
        $postLastests  = Post::where('status', Post::show)->orderBy('id', 'desc')->take(2)->get();
        $postRamdom = Post::where('status', Post::show)->inRandomOrder()->take(2)->get();
        return view('modules.home', compact('posts', 'postLastests', 'postRamdom', 'tags', 'categories'));
    }

    public function getByUser()
    {
        $posts = Post::where('user_id', Auth::user()->id)->paginate(10);
        $categories = Category::all()->where('status', Category::show);
        $tags = Tag::all()->where('status', Tag::show);
        $postLastests  = Post::where('status', Post::show)->orderBy('id', 'desc')->take(2)->get();
        $postRamdom = Post::where('status', Post::show)->inRandomOrder()->take(2)->get();
        return view('modules.myPost', compact('posts', 'postLastests', 'postRamdom', 'tags', 'categories'));
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Validator;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate(15);
        return view('admin.tag.list', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name' => 'required|min:4|max:10|unique:tags,name'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->status = $request->status;
        $tag->save();
        
        return redirect()->route('list-tag')->with('status', 'Thêm mới bản ghi thành công !!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag, $id)
    {
        $tag = Tag::find($id);
        if (!$tag) {
            return abort('404');
        }

        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag, $id)
    {
        $validate = Validator::make($request->all(),[
            'name' => 'required|min:4|max:10'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        } 
        $tag = Tag::find($id);
        $tag->status = $request->status;
        $tag->name = $request->name;
        $tag->save();

        return redirect()->route('list-tag')->with('status', 'Update bản ghi thành công !!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag, $id)
    {
        Tag::destroy($id);
        return redirect()->back()->with('status', 'Xóa bản ghi thành công !!');
    }
}

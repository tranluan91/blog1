<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.category.list', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add');
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
            'name' => 'required|min:4|max:10|unique:categories,name'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }
        $category = new Category();
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();

        return redirect()->route('list-category')->with('status', 'Thêm mới bản ghi thành công !!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return abort('404');
        }

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, $id)
    {
        $validate = Validator::make($request->all(),[
            'name' => 'required|min:4|max:10'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }
        $category = Category::find($id);
        $category->status = $request->status;
        $category->name = $request->name;
        $category->save();
        $posts = Post::all()->where('category_id', '=', $category->id);
        foreach ($posts as $post){
            if ($request->status != Category::show) {
                $post->status = Post::hide;
            } else {
                $post->status = Post::show;
            }
            $post->save();
        }
        
        return redirect()->route('list-category')->with('status', 'Update bản ghi thành công !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        Category::destroy($id);
        return redirect()->back()->with('status', 'Xóa bản ghi thành công !!');   
    }
}

<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;

use App\CategoryPost;
use Illuminate\Http\Request;
use Session;

class CategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Hiển thị danh mục
        $category =  CategoryPost::all();

        return view('layouts.category.index')->with(compact('category'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Hiển thị form  thêm danh mục
        return view('layouts.category.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Thêm danh mục vào database
        $Category = new CategoryPost();
        $Category->title = $request->title;
        $Category->short_desc = $request->short_desc;

        $Category->save();

        
        return redirect()->route('category.index')->with('success', 'Bạn đã thêm thành công');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function show( $categoryPost)
    {
        //Hiển thị form cập nh danh mục
        $category = CategoryPost::find($categoryPost);
        return view('layouts.category.show')->with(compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryPost $categoryPost)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $categoryPost)
    {
        //Cập nhật danh mục bài viết
        $data = $request->all(); //lấy tất cả
        $category = CategoryPost::find($categoryPost);
        $category->title = $data['title'];
        $category->short_desc = $data['short_desc'];

        $category->save();

        return redirect()->route('category.index')->with('success', 'Bạn đã cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoryPost)
    {
        //Xóa danh mục bài viết
        $category = CategoryPost::find($categoryPost);
        $category->delete();
        return redirect()->back();
    }
}

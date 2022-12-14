<?php

namespace App\Http\Controllers\Api\v1;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Post;
use App\CategoryPost;
//use upload file
use Storage;
use File;
use Session;
use Carbon\Carbon;




class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Hiển thị danh mục bài viết
        $post = Post::with('category')->orderBy('id', 'DESC')->paginate(1);
        return view('layouts.post.index')->with(compact('post'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        //
        $category =  CategoryPost::all();
        return view('layouts.post.create')->with(compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Thêm bài viết
        $post = new Post();
        $post->post_date = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $post->title = $request->title;
        $post->views = $request->views;
        $post->short_desc = $request->short_desc;
        $post->desc = $request->desc; 
        $post->post_category_id = $request->post_category_id; 

        if( $request['image']){
            // $image = $request['image'];
            // $ext = $image->getClientOriginalExtension(); 
            // $name = time().''.$image->getClientOriginalName();

            $image = $request['image'];
            // dd($image) ;
            $ext = $image->getClientOriginalExtension();
            $name = time().'_'.$image->getClientOriginalName();
            Storage::disk('public') -> put($name, File::get($image));
            $post-> image = $name;
        }else{
            $post-> image = 'default.jpg';
        }

        $post->save();

        return redirect()->back();
        return redirect()->route('post.index')->with('success', 'Bạn đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show( $post)
    {
        $post = Post::find($post);
        $category =  CategoryPost::all();
        return view('layouts.post.show')->with(compact('category', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post)
    {
        $post = Post::find($post);
        $post->post_date = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $post->title = $request->title;
        $post->views = $request->views;
        $post->short_desc = $request->short_desc;
        $post->desc = $request->desc; 
        $post->post_category_id = $request->post_category_id; 

        if( $request['image']){
            unlink('uploads/'.$post->image);
            // $image = $request['image'];
            // $ext = $image->getClientOriginalExtension(); 
            // $name = time().''.$image->getClientOriginalName();

            $image = $request['image'];
            // dd($image) ;
            $ext = $image->getClientOriginalExtension();
            $name = time().'_'.$image->getClientOriginalName();
            Storage::disk('public') -> put($name, File::get($image));
            $post-> image = $name;
        }

        $post->save();
        return redirect()->route('post.index')->with('success', 'Bạn đã cập nhật thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        //
        $path = 'uploads/';
        $post = Post::find($post);
        unlink($path.$post->image);
        $post->delete();
        return redirect()->back();
    }
}

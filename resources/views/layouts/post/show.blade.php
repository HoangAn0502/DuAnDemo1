@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật bài viết
                    <a href="{{url('/home')}}">Back</a>
                </div>   

                <div class="card-body">
               
                    <!-- Thông báo cập nhật -->
                    @if (Session::has('success'))
                        <div class="alert alert-success" >
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
                    @if (Session::has('failure'))
                        <div class="alert alert-success" >
                            <p>{{ Session::get('failure') }} Cập nhật không thành công</p>
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="{{route('post.update',[$post->id])}}"  autocomplete="off" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf 
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" name="title" id="" class="form-control" value="{{$post->title}}">

                            <label for="title">Hình ảnh</label>
                            <input type="file" name="image" class="form-control" >
                            <p><img width="100px" src="{{asset('/uploads/'.$post->image)}}" alt=""></p>

                            <label for="title">Mô tả ngắn</label>
                            <textarea name="short_desc" class="form-control" id="ckeditor_shortdesc" rows="5" style="resize:none" >{{$post->short_desc}}</textarea>
                            
                            <label for="title">Nội dung</label>
                            <textarea name="desc" class="form-control" id="ckeditor_desc" rows="5" style="resize:none">{{$post->desc}}</textarea>

                            <label for="title">Danh mục bài viết</label>
                            <select name="post_category_id" id="" class="form-control"> 
                                @foreach($category as $key => $cate)
                                    <option {{$cate->id==$post->post_category_id ? 'selected' : ''}} value="{{ $cate->id }}">
                                        {{ $cate->title }}
                                    </option>
                                @endforeach
                            </select>
                            
                            

                            <!-- Nút submit -->
                            <input type="submit" value="Cập bài viết" name="capnhatdanhmuc" class=" mt-2 btn btn-primary">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

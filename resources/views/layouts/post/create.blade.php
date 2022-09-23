@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm bài viết
                    <a href="{{url('/home')}}">Back</a>
                </div>   

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="{{route('post.store')}}" autocomplete="off" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf 
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" name="title" id="" class="form-control" placeholder="Tiêu đề...">

                            <label for="title">Hình ảnh</label>
                            <input type="file" name="image" class="form-control" >

                            <label for="title">Mô tả ngắn</label>
                            <textarea name="short_desc" class="form-control" id="ckeditor_shortdesc" rows="5" placeholder="Mô tả ngắn..." style="resize:none"></textarea>
                            
                            <label for="title">Nội dung</label>
                            <textarea name="desc" class="form-control" id="ckeditor_desc" rows="5" placeholder="Nội dung..." style="resize:none"></textarea>

                            <label for="title">Danh mục bài viết</label>
                            <select name="post_category_id" id="" class="form-control"> 
                                @foreach($category as $key => $cate)
                                    <option value="{{ $cate->id }}">
                                        {{ $cate->title }}
                                    </option>
                                @endforeach
                            </select>
                            
                            

                            <!-- Nút submit -->
                            <input type="submit" value="Thêm bài viết" name="themdanhmuc" class=" mt-2 btn btn-primary">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

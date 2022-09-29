@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm danh mục bài viết
                    <a href="{{url('/home')}}">Back</a>
                </div>   

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Thông báo cập nhật -->
                    @if (Session::has('success'))
                        <div class="alert alert-success" >
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
                    @if (Session::has('failure'))
                        <div class="alert alert-success" >
                            <p>{{ Session::get('failure') }} Thêm không thành công</p>
                        </div>
                    @endif


                    
                    <form action="{{route('category.store')}}" autocomplete="off" method="POST">
                        @csrf 
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" name="title" id="" class="form-control" placeholder="Nhập tiêu đề...">

                            <label for="title">Mô tả danh mục</label>
                            <textarea name="short_desc" id="" class="form-control" rows="5" placeholder="Nhập mô tả..." style="resize:none"></textarea>

                            <input type="submit" value="Thêm" name="themdanhmuc" class=" mt-2 btn btn-primary">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

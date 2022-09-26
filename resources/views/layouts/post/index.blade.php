@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">bài viết
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
                            <p>{{ Session::get('failure') }} Cập nhật không thành công</p>
                        </div>
                    @endif
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Mô tả ngắn</th>
                                <th scope="col">Danh mục</th>

                                <th scope="col">Quản lí</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($post as $p)
                            <tr>
                                <th scope="row">{{$p->id}}</th>
                                <td scope="row">{{$p->title}}</td>
                                <td scope="row"><img width="150px" src="{{asset('/uploads/'.$p->image)}}" alt=""></td>
                                <td scope="row">{!!substr($p->short_desc, 0, 100)!!}</td>
                                <td scope="row">{{$p->category->title}}</td>

                                <td scope="row">
                                    <form action="{{route('post.destroy',[$p->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input class="btn btn-danger mb-2 btn-sm w-50" type="submit" value="Xóa">
                                    </form>


                                    <a class="btn btn-success  btn-sm w-50" href="{{route('post.show',[$p->id])}}">Sửa</a>

                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Danh mục bài viết
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
                                <th scope="col">#</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Mô tả danh mục</th>
                                <th scope="col">Quản lí</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category as $categories)
                            <tr>
                                <th scope="row">{{$categories->id}}</th>
                                <td>{{$categories->title}}</td>
                                <td>{{$categories->short_desc}}</td>
                                <td>
                                    <form action="{{route('category.destroy',[$categories->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input class="btn btn-danger mb-2 btn-sm  " type="submit" value="Xóa">
                                    </form>


                                    <a class="btn btn-success  btn-sm  " href="{{route('category.show',[$categories->id])}}">Sửa</a>

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

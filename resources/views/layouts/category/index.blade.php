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
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Quản lí</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category as $categories)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$categories->title}}</td>
                                <td>
                                    <form action="{{route('category.destroy',[$categories->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input class="btn btn-danger mb-2 btn-sm w-50" type="submit" value="Xóa">
                                    </form>

                                    <form action="{{route('category.edit',[$categories->id])}}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <input class="btn btn-success  btn-sm w-50" type="submit" value="Sửa">
                                    </form>

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

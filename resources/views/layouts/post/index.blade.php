@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                    
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Lượt xem</th>

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
                                <td scope="row">{{$p->views}}</td>

                                <td scope="row"><img width="150px" src="{{asset('/uploads/'.$p->image)}}" alt=""></td>
                                <td scope="row">{!!substr($p->short_desc, 0, 100)!!}</td>
                                <td scope="row">{{$p->category->title}}</td>

                                <td>
                                    <form action="{{route('post.destroy',[$p->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input class="btn btn-danger mb-2 btn-sm " type="submit" value="Xóa">
                                    </form>


                                    <a class="btn btn-success  btn-sm " href="{{route('post.show',[$p->id])}}">Sửa</a>

                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>

                </div>
            </div>
            <div style="margin:5px">
                {{$post->links( )}}
            </div>

            
            <!-- <nav style="margin:5px;" aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                    </li>
                </ul>
            </nav> -->
        </div>
    </div>
</div>
@endsection

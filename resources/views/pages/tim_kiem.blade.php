@extends('layout')
@section('content')
<!--about-starts-->
<div class="about">
		<div class="container">
			<div class="about-main">
				<div class="col-md-8 about-left">
					<div class="about-one">

						<h3>Từ khóa tìm kiếm : {{$keywords}}</h3>
					</div>
				
					<div class="about-tre">
						<div class="a-1">
                            @foreach($category_post as $key => $post)
                                <div class="row" style="margin:5px">
                                    <a href="{{route('danh-muc.show', ['id'=>$post->category->id , 'str'=>Str::slug($post->title)] ) }}">
                                        <h6>{{$post->category->title}}</h6>
                                    </a>
                                    <a href="{{route('bai-viet.show',['id'=>$post->id])}}">
                                        <div class="col-md-6 abt-left">
                                            <img width="100%" src="{{asset('uploads/'.$post->image)}}" alt="{{Str::slug($post->title)}}" />
                                        </div>
                                        <div class="col-md-6 abt-left">
                                            
                                            <h3>{{$post->title}}</h3>
                                            <p>{!!substr($post->short_desc, 0,150)!!}...</p>
                                            <label>{{$post->created_at}}</label>

                                            <a href="{{route('bai-viet.show',['id'=>$post->id])}}">Đọc tiếp...</a>
                                            
                                        </div>
                                    </a>
                                </div>
                            @endforeach
							<div class="clearfix"></div>
						</div>

					</div>	
				</div>
				<div class="col-md-4 about-right heading">

					<div class="abt-2">
                        <h3>Danh mục gợi ý</h3>
                            <ul>
                            @foreach ($category as $key => $rec)

                                <li><a href="{{route('danh-muc.show', ['id'=>$rec->id , 'str'=>Str::slug($rec->title)] ) }}">{{$rec->title}}</a></li>
                                
                            @endforeach
                            </ul>	
                    </div>

				</div>
				<div class="clearfix"></div>			
			</div>		
		</div>
	</div>
	<!--about-end-->
@endsection
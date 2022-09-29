@extends('layout')
@section('content')
<!--about-starts-->
<div class="about">
		<div class="container">
			<div class="about-main">
				<div class="col-md-8 about-left">
					<div class="about-one">

						<h3>{{$title_category->title}}</h3>
					</div>
					<div class="about-two">

						<p>{{$title_category->short_desc}}</p>

						<ul>
							<li><p>Share : </p></li>
							<li><a href="#"><span class="fb"> </span></a></li>
							<li><a href="#"><span class="twit"> </span></a></li>
							<li><a href="#"><span class="pin"> </span></a></li>
							<li><a href="#"><span class="rss"> </span></a></li>
							<li><a href="#"><span class="drbl"> </span></a></li>
						</ul>
					</div>	
					<div class="about-tre">
						<div class="a-1">
                            @foreach($category_post as $key => $post)
                                <div class="row" style="margin:5px">
                                <h6>{{$post->category->title}}</h6>
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
                            {{$category_post->links()}}
							<div class="clearfix"></div>
						</div>

					</div>	
				</div>
				<div class="col-md-4 about-right heading">

					<div class="abt-2">
                        <h3>Danh mục gợi ý</h3>
                            <ul>
                            @foreach ($category_recomment as $key => $rec)

                                <li><a href="{{route('danh-muc.show', ['id'=>$rec->id , 'str'=>Str::slug($rec->title)] ) }}">{{$rec->title}}</a></li>
                                
                            @endforeach
                            </ul>	
                    </div>
					
					<div class="abt-2">
                        <h3>Bài viết xem nhiều</h3>
                            @foreach ($viewest_post as $key => $news)
                            <a href="{{route('bai-viet.show',['id'=>$news->id])}}">
                                <div class="might-grid">
                                
                                    <div class="grid-might">
                                        <img src="{{asset('uploads/'.$news->image)}}" class="img-responsive" alt=""> 
                                    </div>
                                    <div class="might-top">
                                        <a><h6>{{$news->category->title}}</h6></a>
                                        <h5 style="color:black; font-family: Arial;">{{substr($news->title,0,80)}}</h5>
                                        <p>{!!substr($news->short_desc,0,100)!!}...</p> 
                                        <a href="{{route('bai-viet.show',['id'=>$news->id])}}">Đọc tiếp...</a>
                                    </div>
                                    
                                    <div class="clearfix">
                                    </div>
                                
                                </div>	
                            </a>
                            @endforeach
                                
                    </div>
                    

				</div>
				<div class="clearfix"></div>			
			</div>		
		</div>
	</div>
	<!--about-end-->
@endsection
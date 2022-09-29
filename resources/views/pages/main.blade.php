@extends('layout')
@section('content')
@include('pages.banner')
       <!--about-starts-->
        <div class="about">
            <div class="container">
                <div class="about-main">
                    <div class="col-md-8 about-left">
                        <!-- <div class="about-one">
                            <p>Find The Most</p>
                            <h3>Coffee of the month</h3>
                        </div> -->
                        <!-- <div class="about-two">
                            <a href="{{url('/bai-viet/1')}}"><img src="images/c-1.jpg" alt="" /></a>
                            <p>Posted by <a href="#">Johnson</a> on 10 feb, 2015 <a href="#">comments(2)</a></p>
                            <p>Phasellus fringilla enim nibh, ac pharetra nulla vestibulum ac. Donec tempor fermentum felis, non placerat sem ultrices ut. Nam molestie nunc nec felis hendrerit, in pulvinar arcu mollis. Quisque eget purus nec velit venenatis tincidunt vitae ac massa. Proin vel ornare tellus. Duis consectetur gravida tellus ut varius. Aenean tellus massa, laoreet ut euismod et, pretium id ex. Mauris hendrerit suscipit hendrerit.</p>
                            <p>Quisque ultrices ligula a nisl porttitor, vitae porta tortor eleifend. Nulla nec imperdiet ipsum, ut cursus mauris. Proin ut sodales sem, quis vestibulum libero. Proin tempor venenatis congue. Phasellus mollis massa sit amet pharetra consequat. Aliquam quis lacus at sapien tempor semper. Sed ultrices et metus et elementum. Nunc sed justo at erat consequat mollis et eu lectus.</p>
                            <div class="about-btn">
                                <a href="single.html">Read More</a>
                            </div>
                            <ul>
                                <li><p>Share : </p></li>
                                <li><a href="#"><span class="fb"> </span></a></li>
                                <li><a href="#"><span class="twit"> </span></a></li>
                                <li><a href="#"><span class="pin"> </span></a></li>
                                <li><a href="#"><span class="rss"> </span></a></li>
                                <li><a href="#"><span class="drbl"> </span></a></li>
                            </ul>
                        </div>	 -->
                        <!-- <div class="about-tre">
                            <div class="a-1">
                                <div class="col-md-6 abt-left">
                                    <a href="single.html"><img src="images/c-3.jpg" alt="" /></a>
                                    <h6>Find The Most</h6>
                                    <h3><a href="single.html">Tasty Coffee</a></h3>
                                    <p>Vivamus interdum diam diam, non faucibus tortor consequat vitae. Proin sit amet augue sed massa pellentesque viverra. Suspendisse iaculis purus eget est pretium aliquam ut sed diam.</p>
                                    <label>May 29, 2015</label>
                                </div>
                                <div class="col-md-6 abt-left">
                                    <a href="single.html"><img src="images/c-4.jpg" alt="" /></a>
                                    <h6>Find The Most</h6>
                                    <h3><a href="single.html">Tasty Coffee</a></h3>
                                    <p>Vivamus interdum diam diam, non faucibus tortor consequat vitae. Proin sit amet augue sed massa pellentesque viverra. Suspendisse iaculis purus eget est pretium aliquam ut sed diam.</p>
                                    <label>May 29, 2015</label>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="a-1">
                                <div class="col-md-6 abt-left">
                                    <a href="single.html"><img src="images/c-5.jpg" alt="" /></a>
                                    <h6>Find The Most</h6>
                                    <h3><a href="single.html">Tasty Coffee</a></h3>
                                    <p>Vivamus interdum diam diam, non faucibus tortor consequat vitae. Proin sit amet augue sed massa pellentesque viverra. Suspendisse iaculis purus eget est pretium aliquam ut sed diam.</p>
                                    <label>May 29, 2015</label>
                                </div>
                                <div class="col-md-6 abt-left">
                                    <a href="single.html"><img src="images/c-6.jpg" alt="" /></a>
                                    <h6>Find The Most</h6>
                                    <h3><a href="single.html">Tasty Coffee</a></h3>
                                    <p>Vivamus interdum diam diam, non faucibus tortor consequat vitae. Proin sit amet augue sed massa pellentesque viverra. Suspendisse iaculis purus eget est pretium aliquam ut sed diam.</p>
                                    <label>May 29, 2015</label>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="a-1">
                                <div class="col-md-6 abt-left">
                                    <a href="single.html"><img src="images/c-7.jpg" alt="" /></a>
                                    <h6>Find The Most</h6>
                                    <h3><a href="single.html">Tasty Coffee</a></h3>
                                    <p>Vivamus interdum diam diam, non faucibus tortor consequat vitae. Proin sit amet augue sed massa pellentesque viverra. Suspendisse iaculis purus eget est pretium aliquam ut sed diam.</p>
                                    <label>May 29, 2015</label>
                                </div>
                                <div class="col-md-6 abt-left">
                                    <a href="single.html"><img src="images/c-8.jpg" alt="" /></a>
                                    <h6>Find The Most</h6>
                                    <h3><a href="single.html">Tasty Coffee</a></h3>
                                    <p>Vivamus interdum diam diam, non faucibus tortor consequat vitae. Proin sit amet augue sed massa pellentesque viverra. Suspendisse iaculis purus eget est pretium aliquam ut sed diam.</p>
                                    <label>May 29, 2015</label>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>	 -->


                        <div class="about-tre">
						<div class="a-1">
                            @foreach($all_post as $key => $post)
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
                    {{$all_post->links()}}


                    </div>


                    <div class="col-md-4 about-right heading">
                        <!-- <div class="abt-1">
                            <h3>ABOUT US</h3>
                            <div class="abt-one">
                                <img src="images/c-2.jpg" alt="" />
                                <p>Quisque non tellus vitae mauris luctus aliquam sit amet id velit. Mauris ut dapibus nulla, a dictum neque.</p>
                                <div class="a-btn">
                                    <a href="single.html">Read More</a>
                                </div>
                            </div>
                        </div> -->
                        <div class="abt-2">
                            <h3>Bài viết mới nhất</h3>
                            @foreach ($newest_post as $key => $news)
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
                        <div class="abt-2">
                            <h3>Bìa viết xem nhiều</h3>
                            <ul>
                            @foreach ($viewest_post as $key => $view)

                                <li><a href="{{route('bai-viet.show',['id'=>$view->id])}}">{{substr($view->title,0,80)}}...</a></li>
                                
                            @endforeach
                            </ul>	
                        </div>
                        <div class="abt-2">
                            <h3>NEWS LETTER</h3>
                            <div class="news">
                                <form>
                                    <input type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" />
                                    <input type="submit" value="Đăng kí">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>			
                </div>		
            </div>
        </div>
        <!--about-end-->
@endsection
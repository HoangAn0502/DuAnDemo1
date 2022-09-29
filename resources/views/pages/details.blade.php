@extends('layout')
@section('content')
    <!--start-single-->

	<div class="single">
		<div class="container">
			<style type="text/css">	
				.single-top single_post img{
					width: 100% !important;
				}

			</style>
			<div class="col-md-8">
				<div class="single-top single_post">
						<a href="#"><img class="img-responsive" src="{{ asset('uploads/'.$post->image) }}" alt=" "></a>
					<div class=" single-grid">
						<h4 style="text-align: center; form-weight: bold; form-size:30px; font-family: sans-serif;">{{$post->title}}</h4>				
							<ul class="blog-ic">
								<li><a href="#"><span> <i  class="glyphicon glyphicon-user"> </i>Admin</span> </a> </li>
		  						 <li><span><i class="glyphicon glyphicon-time"> </i>{{$post->created_at}}</span></li>		  						 	
		  						 <li><span><i class="glyphicon glyphicon-eye-open"> </i>View:{{$post->views}}</span></li>
		  					</ul>		  						
						<h6>{!!$post->short_desc!!}</h6>
						<p>{!!$post->desc!!}</p>
					</div>

					
					<div class="comments heading">
						<h3>Bình luận về bài viết</h3>
						<div class="media">
					      	<div class="media-body">
						        <h4 class="media-heading">	Richard Spark</h4>
						        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs .  </p>
					      	</div>
					      <div class="media-right">
					        <a href="#">
								<img src="{{ asset('images/si.png') }}" alt=""> </a>
					      </div>
					 </div>
					  <div class="media">
					      <div class="media-left">
					        <a href="#">
					        	<img src="{{ asset('images/si.png') }}" alt="">
					        </a>
					      </div>
					      <div class="media-body">
					        <h4 class="media-heading">Joseph Goh</h4>
					        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs .  </p>
					      </div>
					    </div>
    				</div>
    				<div class="comment-bottom heading">
    					<h3>Để lại bình luận</h3>
    					<form>	
						<input type="text" value="Name" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Name';}">
						<input type="text" value="Email" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Email';}">
						<input type="text" value="Subject" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Subject';}">
						<textarea cols="77" rows="6" value=" " onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
							<input type="submit" value="Gửi bình luận">
					</form>
    				</div>
				</div>	
			</div>	
			<div class="col-sm-4 about-right heading">
				<div class="abt-2">
                    <h3>Bài viết liên quan</h3>
						@foreach ($post_related as $key => $relate)
                            <a href="{{route('bai-viet.show',['id'=>$relate->id])}}">
                                <div class="might-grid">
                                
                                    <div class="grid-might">
                                        <img src="{{asset('uploads/'.$relate->image)}}" class="img-responsive" alt=""> 
                                    </div>
                                    <div class="might-top">
                                        <h5 style="color:black; font-family: Arial;">{{substr($relate->title,0,80)}}</h5>
                                        <p>{!!substr($relate->short_desc,0,100)!!}...</p> 
                                        <a href="{{route('bai-viet.show',['id'=>$relate->id])}}">Đọc tiếp...</a>
                                    </div>
                                    
                                    <div class="clearfix">
                                    </div>
                                
                                </div>	
                            </a>
                            @endforeach
                </div>
			</div>
		</div>					
	</div>
	<!--end-single-->
@endsection
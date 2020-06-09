@extends('layouts.welcome')

@section('content')
@include('layouts.panelhead')
<div class="single">
	 <div class="container">
		  <div class="col-md-8 single-main">				 
			  <div class="single-grid">
			    <div class="page-header">
			    <!-- ======================================================== -->
	                <!-- if user's ip was for IR -->
	              	  <h1 align="center">{{str_replace('-', ' ', $video->title)}}</h1>
	                <!-- if user's ip was foreign -->
	             <!-- <h1 align="center">{{str_replace('-', ' ', $video->titleFUser)}}</h1> -->
	            <!-- ======================================================== -->
				</div>
                   <video class="mejs__player responsive-video" controls preload="auto" 
				    poster="/uploads/images/video_games/{{ $video->picture_game_n1 }}" 
				    width="669" height="320">
				      <source src="/uploads/videos/{{ $video->video_game }}" type="video/mp4" />
				    </video>						 					 
					  <!-- ======================================================== -->
			                   <!-- if user's ip was for IR -->
			                     <p>{!! $video->description !!}</p>
			                   <!-- if user's ip was foreign --> 
			                     <!-- <p>{!! $video->descriptionFUser !!}</p> -->
			          <!-- ======================================================== -->

						<div class="table-responsive">
						  <table class="table">
						    <tbody>
						    	<tr>
						    		<td>
						    		   <a href="{{url('download/video-game', $video->id)}}" title="دانلود" class="fa fa-download"></a>
						    		</td>
						    		<td>
						    		  <a href="javascript:void(0)" title="بازدید کنندگان" class="fa fa-eye"></a> {{Counter::showAndCount('game', $video->id)}}
						    		</td>
						    	</tr>
						    	<tr>
						    		<td>
						    			<a href="javascript:void(0)" title="آپلود شده" class="fa fa-cloud-upload"></a> {{\Carbon\Carbon::parse($video->created_at)->diffForHumans()}}
						    		</td>
						    		<td>
						    			<a href="javascript:void(0)" title="ویرایش شده" class="fa fa-pencil-square-o"></a> {{\Carbon\Carbon::parse($video->updated_at)->diffForHumans()}}
						    		</td>
						    	</tr>
						    </tbody>
						  </table>
						</div>
						
					<div class="w3-content w3-section" style="max-width:500px">
					   @if ($video->picture_game_n2_status == 1)
					     <img class="mySlides w3-animate-fading" src="/uploads/images/video_games/{{ $video->picture_game_n2 }}" 
					       alt="{{ $video->title }}" style="width:100%" width="500" height="300">
					   @endif
					   @if ($video->picture_game_n3_status == 1)
					     <img class="mySlides w3-animate-fading" src="/uploads/images/video_games/{{ $video->picture_game_n3 }}" 
					       alt="{{ $video->title }}" style="width:100%" width="500" height="300">
					   @endif
					   @if ($video->picture_game_n4_status == 1)
					     <img class="mySlides w3-animate-fading" src="/uploads/images/video_games/{{ $video->picture_game_n4 }}" 
					       alt="{{ $video->title }}" style="width:100%" width="500" height="300">
					   @endif
					    @if ($video->picture_game_n5_status == 1 && $video->picture_game_n5_status != '')
					    <img class="mySlides w3-animate-fading" src="/uploads/images/video_games/{{ $video->picture_game_n5 }}" 
					       alt="{{ $video->title }}" style="width:100%" width="500" height="300">
					    @endif
					    @if ($video->picture_game_n6_status == 1 && $video->picture_game_n6_status != '')
					    <img class="mySlides w3-animate-fading" src="/uploads/images/video_games/{{ $video->picture_game_n6 }}" 
					       alt="{{ $video->title }}" style="width:100%" width="500" height="300">
					    @endif
					</div>

	          </div>
		  </div>
				@include('right_panel')
			  <div class="clearfix"></div>
		  </div>
	  </div>
@endsection

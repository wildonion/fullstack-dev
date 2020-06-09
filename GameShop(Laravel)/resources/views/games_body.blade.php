@extends('layouts.welcome')
@section('content')
@include('layouts.panelhead')
  <div class="content">
   <div class="container">
     <div class="content-grids">
       <div class="col-md-8 content-main">
         <div class="content-grid"> 
          @if(count($g_videos) != 0) 
            @foreach ($g_videos as $video)
            <div class="content-grid-info">
               <img src="/uploads/images/video_games/{{$video->picture_game_n1}}" 
                alt="{{$video->title}}" width="669" height="320" class="img-responsive" />
               <div class="post-info">
               <!-- ==================================================================== -->
                  <!-- if user's ip was for IR -->
                    <h4 dir="rtl">
                    <a href="{{ url('game/'.$video->id.'/'. $video->title) }}">{{str_replace('-', ' ', $video->title)}}</a>
                    </h4>

                  <!-- if user's ip was foreign -->  
                    <!-- <h4>
                    <a href="{{ url('game/'.$video->id.'/'. $video->titleFUser) }}"> {{str_replace('-', ' ', $video->titleFUser)}}</a>
                    </h4> -->
              <!-- ==================================================================== -->
                <h4>{{\Carbon\Carbon::parse($video->created_at)->diffForHumans()}}</h4>
               <!-- ==================================================================== -->
                  <!-- if user's ip was for IR -->
                      <div dir="rtl">
                      {!! \Illuminate\Support\Str::words($video->description, 10,' ....') !!}
                      </div>
                  <!-- if user's ip was foreign -->
                     <!-- <p>{!! \Illuminate\Support\Str::words($video->descriptionFUser, 10,' ....') !!}</p> -->
               <!-- ==================================================================== -->
                      <!-- if user's ip was for IR -->
                    <a href="{{ url('game/'.$video->id.'/'. $video->title) }}"><span></span>ادامه مطلب</a>
                      <!-- if user's ip was foreign -->
                  <!-- <a href="{{ url('game/'.$video->id.'/'. $video->titleFUser) }}"><span></span>Read More</a> -->
               <!-- ==================================================================== -->
               </div>
           </div>
            @endforeach
           <div class="pagination pagination-sm">
               {{ $g_videos->links() }}
           </div>       
           @endif
         </div>
        </div>
        <!-- ===================================================== -->
        @include('right_panel')
        <div class="clearfix"></div>
      </div>
    </div>
</div>
@endsection

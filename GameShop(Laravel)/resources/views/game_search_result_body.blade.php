@extends('layouts.welcome')
@section('content')
@include('layouts.panelhead')
  <div class="content">
   <div class="container">
     <div class="content-grids">
       <div class="col-md-8 content-main">
         <div class="content-grid"> 
          @if(count($games) != 0)
             @foreach ($games as $game)
              <div class="content-grid-info">
                 <img src="/uploads/images/video_games/{{$game->picture_game_n1}}" 
                  alt="{{$game->title}}" width="669" height="320" class="img-responsive"/>
                 <div class="post-info">
                 <!-- ==================================================================== -->
                    <!-- if user's ip was for IR -->
                      <h4 dir="rtl"><a href="{{ url('game/'.$game->id.'/'. $game->title) }}">{{str_replace('-', ' ', $game->title)}}</a></h4>
                    <!-- if user's ip was foreign -->  
                      <!-- <h4><a href="{{ url('game/'.$game->id.'/'. $game->titleFUser) }}">{{str_replace('-', ' ', $game->titleFUser)}}</a></h4> -->
                <!-- ==================================================================== -->
                 <h4>{{\Carbon\Carbon::parse($game->created_at)->diffForHumans()}}</h4>
                 <!-- ==================================================================== -->
                    <!-- if user's ip was for IR -->
                        <div dir="rtl">{!! \Illuminate\Support\Str::words($game->description, 10,' ....') !!}</div>
                    <!-- if user's ip was foreign -->
                       <!-- <p>{!! \Illuminate\Support\Str::words($game->descriptionFUser, 10,' ....') !!}</p> -->
                 <!-- ==================================================================== -->
                        <!-- if user's ip was for IR -->
                      <a href="{{ url('game/'.$game->id.'/'. $game->title) }}"><span></span>ادامه مطلب</a>
                        <!-- if user's ip was foreign -->
                    <!--  <a href="{{ url('game/'.$game->id.'/'. $game->titleFUser) }}"><span></span>Read More</a> -->
                 <!-- ==================================================================== -->
                 </div>
             </div>
              @endforeach
              <div class="pagination pagination-sm">
                 {{ $games->links() }}
             </div>  
          @else
             <div class="content-grid-info">
               <!-- if user's ip was for IR -->
                <p dir="rtl">نتیجه ای برای <strong>{{$q}}</strong> یافت نشد</p>    
              <!-- if user's ip was foreign -->
              <!-- <p dir="ltr">No reult found for <strong>{{$q}}</strong></p> -->
                <img src="/nfound.png" 
                  alt="no_result_found" width="200" height="100" class="img-responsive"/>
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

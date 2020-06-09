@extends('layouts.welcome')
@section('content')
@include('layouts.panelhead')
  <div class="content">
   <div class="container">
     <div class="content-grids">
       <div class="col-md-8 content-main">
         <div class="content-grid"> 
          @if(count($best_of_games) != 0)   
            @foreach ($best_of_games as $best_game)
             @if(Counter::showAndCount('game', $best_game->id) >= 1000)
                <div class="content-grid-info">
                   <img src="/uploads/images/news/{{$best_game->picture}}" 
                    alt="{{$best_game->title}}" width="669" height="320" class="img-responsive"/>
                   <div class="post-info">
                   <!-- ==================================================================== -->
                      <!-- if user's ip was for IR -->
                        <h4 dir="rtl">
                        <a href="{{ url('blog/'.$best_game->id.'/'. $best_game->title) }}">
                        {{str_replace('-', ' ', $best_game->title)}}</a>
                        </h4>
                        
                      <!-- if user's ip was foreign -->  
                        <!-- <h4>
                        <a href="{{ url('blog/'.$best_game->id.'/'. $best_game->titleF_User) }}">
                        {{str_replace('-', ' ', $best_game->titleF_User)}}</a>
                        </h4> -->
                  <!-- ==================================================================== -->
                   <h4>{{\Carbon\Carbon::parse($best_game->created_at)->diffForHumans()}}</h4>
                   <!-- ==================================================================== -->
                      <!-- if user's ip was for IR -->
                          <div dir="rtl">
                          {!! \Illuminate\Support\Str::words($best_game->description, 10,' ....') !!}
                          </div>
                      <!-- if user's ip was foreign -->
                         <!-- <p>{!! \Illuminate\Support\Str::words($best_game->descriptionF_User, 10,' ....') !!}</p> -->
                   <!-- ==================================================================== -->
                          <!-- if user's ip was for IR -->
                        <a href="{{ url('blog/'.$best_game->id.'/'. $best_game->title) }}"><span></span>ادامه مطلب</a>
                          <!-- if user's ip was foreign -->
                      <!--  <a href="{{ url('blog/'.$best_game->id.'/'. $best_game->titleF_User) }}"><span></span>Read More</a> -->
                   <!-- ==================================================================== -->
                   </div>
               </div>
              @endif
            @endforeach
           <div class="pagination pagination-sm">
               {{ $best_of_games->links() }}
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

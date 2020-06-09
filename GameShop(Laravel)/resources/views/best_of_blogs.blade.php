@extends('layouts.welcome')
@section('content')
@include('layouts.panelhead')
  <div class="content">
   <div class="container">
     <div class="content-grids">
       <div class="col-md-8 content-main">
         <div class="content-grid"> 
          @if(count($best_of_blogs) != 0)   
            @foreach ($best_of_blogs as $best_blog)
             @if(Counter::showAndCount('blog', $best_blog->id) >= 1000)
                <div class="content-grid-info">
                   <img src="/uploads/images/news/{{$best_blog->picture}}" 
                    alt="{{$best_blog->title}}" width="669" height="320" class="img-responsive"/>
                   <div class="post-info">
                   <!-- ==================================================================== -->
                      <!-- if user's ip was for IR -->
                        <h4 dir="rtl">
                        <a href="{{ url('blog/'.$best_blog->id.'/'. $best_blog->title) }}">
                        {{str_replace('-', ' ', $best_blog->title)}}</a>
                        </h4>
                        
                      <!-- if user's ip was foreign -->  
                        <!-- <h4>
                        <a href="{{ url('blog/'.$best_blog->id.'/'. $best_blog->titleF_User) }}">
                        {{str_replace('-', ' ', $best_blog->titleF_User)}}</a>
                        </h4> -->
                  <!-- ==================================================================== -->
                   <h4>{{\Carbon\Carbon::parse($best_blog->created_at)->diffForHumans()}}</h4>
                   <!-- ==================================================================== -->
                      <!-- if user's ip was for IR -->
                          <div dir="rtl">
                          {!! \Illuminate\Support\Str::words($best_blog->description, 10,' ....') !!}
                          </div>
                      <!-- if user's ip was foreign -->
                         <!-- <p>{!! \Illuminate\Support\Str::words($best_blog->descriptionF_User, 10,' ....') !!}</p> -->
                   <!-- ==================================================================== -->
                          <!-- if user's ip was for IR -->
                        <a href="{{ url('blog/'.$best_blog->id.'/'. $best_blog->title) }}"><span></span>ادامه مطلب</a>
                          <!-- if user's ip was foreign -->
                      <!--  <a href="{{ url('blog/'.$best_blog->id.'/'. $best_blog->titleF_User) }}"><span></span>Read More</a> -->
                   <!-- ==================================================================== -->
                   </div>
               </div>
              @endif
            @endforeach
           <div class="pagination pagination-sm">
               {{ $best_of_blogs->links() }}
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

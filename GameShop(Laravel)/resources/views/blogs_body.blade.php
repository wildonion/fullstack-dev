@extends('layouts.welcome')
@section('content')
@include('layouts.panelhead')
  <div class="content">
   <div class="container">
     <div class="content-grids">
       <div class="col-md-8 content-main">
         <div class="content-grid"> 
          @if(count($news) != 0)   
            @foreach ($news as $new)
            <div class="content-grid-info">
			         <img src="/uploads/images/news/{{$new->picture}}" 
                alt="{{$new->title}}" width="669" height="320" class="img-responsive"/>
               <div class="post-info">
               <!-- ==================================================================== -->
                  <!-- if user's ip was for IR -->
                    <h4 dir="rtl">
                    <a href="{{ url('blog/'.$new->id.'/'. $new->title) }}">
                    {{str_replace('-', ' ', $new->title)}}</a>
                    </h4>
                    
                  <!-- if user's ip was foreign -->  
                    <!-- <h4>
                    <a href="{{ url('blog/'.$new->id.'/'. $new->titleF_User) }}">
                    {{str_replace('-', ' ', $new->titleF_User)}}</a>
                    </h4> -->
              <!-- ==================================================================== -->
               <h4>{{\Carbon\Carbon::parse($new->created_at)->diffForHumans()}}</h4>
               <!-- ==================================================================== -->
                  <!-- if user's ip was for IR -->
                      <div dir="rtl">
                      {!! \Illuminate\Support\Str::words($new->description, 10,' ....') !!}
                      </div>
                  <!-- if user's ip was foreign -->
                     <!-- <p>{!! \Illuminate\Support\Str::words($new->descriptionF_User, 10,' ....') !!}</p> -->
               <!-- ==================================================================== -->
                      <!-- if user's ip was for IR -->
                    <a href="{{ url('blog/'.$new->id.'/'. $new->title) }}"><span></span>ادامه مطلب</a>
                      <!-- if user's ip was foreign -->
                  <!--  <a href="{{ url('blog/'.$new->id.'/'. $new->titleF_User) }}"><span></span>Read More</a> -->
               <!-- ==================================================================== -->
               </div>
           </div>
            @endforeach
           <div class="pagination pagination-sm">
               {{ $news->links() }}
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
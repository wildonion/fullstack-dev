@if ($body->status == 1)
  @extends('layouts.welcome')
  @section('content')
  @include('layouts.panelhead')
<div class="content">
   <div class="container">
     <div class="content-grids">
       <div class="col-md-8 content-main">
         <div class="content-grid">
          <div class="content-grid-info">
               @if(count($videos) == 3) 
                    @php
                      $i = 1
                    @endphp
                 @foreach($videos as $video)
                        <input type="hidden" id="img{{$i}}" value="/uploads/images/video_games/{{ $video->picture_game_n2 }}">
                        <!-- if user's ip was for IR -->
                        <input type="hidden" id="title{{$i}}" value="{{ $video->title }}">
                        <input type="hidden" id="caption{{$i}}" value="{{ $video->caption_n2 }}">
                        <!-- if user's ip was foreign -->
                        <!-- <input type="hidden" id="title{{$i}}" value="{{ $video->titleFUser }}">
                        <input type="hidden" id="caption{{$i}}" value="{{ $video->caption_n2F_User }}"> -->
                        @php
                          $i++
                        @endphp
                        <input type="hidden" id="img{{$i}}" value="/uploads/images/video_games/{{ $video->picture_game_n3 }}">
                        <!-- if user's ip was for IR -->
                        <input type="hidden" id="title{{$i}}" value="{{ $video->title }}">
                        <input type="hidden" id="caption{{$i}}" value="{{ $video->caption_n3 }}">
                        <!-- if user's ip was foreign -->
                        <!-- <input type="hidden" id="title{{$i}}" value="{{ $video->titleFUser }}">
                        <input type="hidden" id="caption{{$i}}" value="{{ $video->caption_n3F_User }}"> -->
                        @php
                          $i++
                        @endphp
                        <input type="hidden" id="img{{$i}}" value="/uploads/images/video_games/{{ $video->picture_game_n4 }}">
                        <!-- if user's ip was for IR -->
                        <input type="hidden" id="title{{$i}}" value="{{ $video->title }}">
                        <input type="hidden" id="caption{{$i}}" value="{{ $video->caption_n4 }}">
                        <!-- if user's ip was foreign -->
                        <!-- <input type="hidden" id="title{{$i}}" value="{{ $video->titleFUser }}">
                        <input type="hidden" id="caption{{$i}}" value="{{ $video->caption_n4F_User}}"> -->
                        @php
                          $i++
                        @endphp
                  @endforeach
  
                  <div id="wrapper">
                    <div id="gallery"></div>
                    <div id="indicators_wrapper">
                      <div id="indicators"></div>
                    </div>
                    <!-- if user's ip was for IR -->
                     <div id="text" dir="rtl"></div>
                    <!-- if user's ip was foreign -->
                      <!-- <div id="text"></div> -->
                   </div>
                @endif
           </div>
             <div class="content-grid-info">
              <!-- =========================================== -->
                  <!-- if user's ip was for IR -->
                  @if($aci->about_me != '')
                    <div>{!! $aci->about_me !!}</div>
                  @endif
                   <!-- if user's ip was foreign -->
                  <!-- @if($aci->about_meF_User != '')
                    <div>{!! $aci->about_meF_User !!}</div>
                  @endif -->
              <!-- =========================================== -->
             </div> 
            <div class="clearfix"></div>
         </div>
        </div>
        @include('right_panel')
        <div class="clearfix"></div>
      </div>
    </div>
</div>
@endsection
@endif
<!-- ===================================================================================== -->
@if ($body->status == 0)
 @if(Auth::guest())
  @section('content')
   <div class="container">
     <div class="content-grids">
       <div class="col-md-8 content-main">
         <div class="content-grid">
          <div class="content-grid-info">
          <!-- ========================================= -->
              <!-- if user's ip was for IR -->
            @if($body->title != '')
                    <div dir="rtl">{{$body->title}}</div>
            @endif
               <!--  if user's ip was foreign -->
             <!-- @if($body->titleF_User != '')
                  <div>{{$body->titleF_User}}</div>
             @endif -->
          <!-- ========================================= -->
              <!-- if user's ip was for IR -->
              <div>{!! $body->description !!}</div>
              <!-- if user's ip was foreign -->
              <!-- <div>{!! $body->descriptionF_User !!}</div> -->
          <!-- ========================================= -->

              @if($body->picture != '')
               <!-- if user's ip was for IR -->
                 <img src="/uploads/images/body_setting/{{ $body->picture }}" alt="body picture" 
                      class="img-responsive" width="80" height="80" style="float: right !important;">
                <!-- if user's ip was foreign -->
                 <!-- <img src="uploads/images/body_setting/{{ $body->picture }}" alt="body picture" 
                      class="img-responsive" width="80" height="80"> -->
              @endif

          </div>
         </div>
        </div>
      </div>
    </div>
  @endsection
  <!-- ===================================================================================== -->
  @else
       @section('content')
        @include('layouts.panelhead')
      <div class="content">
         <div class="container">
           <div class="content-grids">
             <div class="col-md-8 content-main">
               <div class="content-grid">
                <div class="content-grid-info">
               @if(count($videos) == 3) 
                    @php
                      $i = 1
                    @endphp
                 @foreach($videos as $video)
                        <input type="hidden" id="img{{$i}}" value="/uploads/images/video_games/{{ $video->picture_game_n2 }}">
                        <!-- if user's ip was for IR -->
                        <input type="hidden" id="title{{$i}}" value="{{ $video->title }}">
                        <input type="hidden" id="caption{{$i}}" value="{{ $video->caption_n2 }}">
                        <!-- if user's ip was foreign -->
                        <!-- <input type="hidden" id="title{{$i}}" value="{{ $video->titleFUser }}">
                        <input type="hidden" id="caption{{$i}}" value="{{ $video->caption_n2F_User }}"> -->
                        @php
                          $i++
                        @endphp
                        <input type="hidden" id="img{{$i}}" value="/uploads/images/video_games/{{ $video->picture_game_n3 }}">
                        <!-- if user's ip was for IR -->
                        <input type="hidden" id="title{{$i}}" value="{{ $video->title }}">
                        <input type="hidden" id="caption{{$i}}" value="{{ $video->caption_n3 }}">
                        <!-- if user's ip was foreign -->
                        <!-- <input type="hidden" id="title{{$i}}" value="{{ $video->titleFUser }}">
                        <input type="hidden" id="caption{{$i}}" value="{{ $video->caption_n3F_User }}"> -->
                        @php
                          $i++
                        @endphp
                        <input type="hidden" id="img{{$i}}" value="/uploads/images/video_games/{{ $video->picture_game_n4 }}">
                        <!-- if user's ip was for IR -->
                        <input type="hidden" id="title{{$i}}" value="{{ $video->title }}">
                        <input type="hidden" id="caption{{$i}}" value="{{ $video->caption_n4 }}">
                        <!-- if user's ip was foreign -->
                        <!-- <input type="hidden" id="title{{$i}}" value="{{ $video->titleFUser }}">
                        <input type="hidden" id="caption{{$i}}" value="{{ $video->caption_n4F_User}}"> -->
                        @php
                          $i++
                        @endphp
                  @endforeach
  
                  <div id="wrapper">
                    <div id="gallery"></div>
                    <div id="indicators_wrapper">
                      <div id="indicators"></div>
                    </div>
                     <!-- if user's ip was for IR -->
                     <div id="text" dir="rtl"></div>
                    <!-- if user's ip was foreign -->
                      <!-- <div id="text"></div> -->
                   </div>
                @endif
           </div>
                   <div class="content-grid-info">
                    <!-- =========================================== -->
                        <!-- if user's ip was for IR -->
                        @if($aci->about_me != '')
                          <div>{!! $aci->about_me !!}</div>
                        @endif
                         <!-- if user's ip was foreign -->
                        <!-- @if($aci->about_meF_User != '')
                          <div>{!! $aci->about_meF_User !!}</div>
                        @endif -->
                    <!-- =========================================== -->
                   </div> 
                  <div class="clearfix"></div>
               </div>
              </div>
                @include('right_panel')
              <div class="clearfix"></div>
            </div>
          </div>
      </div>
      @endsection
  @endif
@endif
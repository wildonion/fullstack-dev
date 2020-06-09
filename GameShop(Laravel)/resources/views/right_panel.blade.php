<!-- if user's ip was for IR -->
 <div class="container-fluid">
 @if($view_name == 'games_body' || 
     $view_name == 'blogs_body' ||
     $view_name == 'game_search_result_body' ||
     $view_name == 'blog_search_result_body')
 <form method="POST" action="{{url('search-result')}}">
 {{ csrf_field() }}

  @if($view_name == 'games_body')
     @if(Session::has('game'))
          {{Session::forget('game')}}
     @endif
     @if(Session::has('blog'))
          {{Session::forget('blog')}}
     @endif 
          <input type="hidden" name="" value="{{Session::regenerate()}}">
          {{Session::put('game', 'true')}}
  @elseif($view_name == 'blogs_body')
      @if(Session::has('game'))
          {{Session::forget('game')}}
      @endif
      @if(Session::has('blog'))
          {{Session::forget('blog')}}
      @endif 
          <input type="hidden" name="" value="{{Session::regenerate()}}">
          {{Session::put('blog', 'true')}}
  @elseif($view_name == 'game_search_result_body')
      @if(Session::has('game'))
          {{Session::forget('game')}}
      @endif
      @if(Session::has('blog'))
          {{Session::forget('blog')}}
      @endif 
          <input type="hidden" name="" value="{{Session::regenerate()}}">
          {{Session::put('game', 'true')}}
  @elseif($view_name == 'blog_search_result_body')
      @if(Session::has('game'))
          {{Session::forget('game')}}
      @endif
      @if(Session::has('blog'))
          {{Session::forget('blog')}}
      @endif 
          <input type="hidden" name="" value="{{Session::regenerate()}}">
          {{Session::put('blog', 'true')}}
  @endif
   
  <input type="text" 
  @if($view_name == 'games_body') 
    name="games_search" placeholder="بازی خاصی مد نظرته.."
  @elseif($view_name == 'blogs_body')
    name="blogs_search" placeholder="بلاگ خاصی مد نظرته.."
  @elseif($view_name == 'game_search_result_body')
    name="games_search" placeholder="بازی خاصی مد نظرته.."
  @else  
    name="blogs_search" placeholder="بلاگ خاصی مد نظرته.."
  @endif
     dir="rtl" class="searchbtn">
 </form>
 @endif
   <div class="row">
      <div class="col-md-4 col-sm-8 sidebar1">
          <div class="right-navigation">
              <ul class="list" dir="rtl">
                  <h4><strong>بازی های تازه</strong></h4>
                  @foreach($videos as $video)
                    <li><a href="{{ url('game/'.$video->id.'/'. str_replace(' ', '-', $video->title)) }}">
                    {{str_replace('-', ' ', $video->title)}}</a></li>
                  @endforeach
              </ul>

              <br>

              <ul class="list" dir="rtl">
                  <h4><strong>پست های تازه</strong></h4>
                  @foreach($blogs as $blog)
                    <li><a href="{{ url('blog/'.$blog->id.'/'. str_replace(' ', '-', $blog->title)) }}">
                    {{str_replace('-', ' ', $blog->title)}}</a></li>
                  @endforeach
              </ul>

              <br>

              <ul class="list" dir="rtl">
               <h4><strong>بازدید های تازه</strong></h4>
                   @foreach($comments as $comment)
                    <li>
                  <a href="{{ url('blog/'.$comment->news_ID.'/'. str_replace(' ', '-', $comment->news_title)) }}">
                    {!! str_limit($comment->content, 15,' ....') !!}</a></li>
                   @endforeach
              </ul>
              <style>
              @import url("/css/fonts.css");
                .list> li, h4 {
                      font-family: 'BTabassom';
                      font-size: 1.5em;
                  }
                 .list>li:hover {
                      background-color: rgba(255, 255, 255, 0.2);
                      border-right: 5px solid white;
                      color: white;
                      font-weight: bolder;
                      padding-right: 35px;
                  }
              </style>
          </div>
      </div>
   </div>
</div>
<!-- ================================================================================================= -->
<!-- if user's ip was foreign -->
<!--   <div class="container-fluid">
       @if($view_name == 'games_body' || 
           $view_name == 'blogs_body' ||
           $view_name == 'game_search_result_body' ||
           $view_name == 'blog_search_result_body')
       <form method="POST" action="{{url('search-result')}}">
       {{ csrf_field() }}

   @if($view_name == 'games_body')
      @if(Session::has('game'))
              {{Session::forget('game')}}
         @endif
         @if(Session::has('blog'))
              {{Session::forget('blog')}}
         @endif 
              <input type="hidden" name="" value="{{Session::regenerate()}}">
              {{Session::put('game', 'true')}}
    @elseif($view_name == 'blogs_body')
          @if(Session::has('game'))
              {{Session::forget('game')}}
          @endif
          @if(Session::has('blog'))
              {{Session::forget('blog')}}
          @endif 
              <input type="hidden" name="" value="{{Session::regenerate()}}">
              {{Session::put('blog', 'true')}}
    @elseif($view_name == 'game_search_result_body')
          @if(Session::has('game'))
              {{Session::forget('game')}}
          @endif
          @if(Session::has('blog'))
              {{Session::forget('blog')}}
          @endif 
              <input type="hidden" name="" value="{{Session::regenerate()}}">
              {{Session::put('game', 'true')}}
    @elseif($view_name == 'blog_search_result_body')
          @if(Session::has('game'))
              {{Session::forget('game')}}
          @endif
          @if(Session::has('blog'))
              {{Session::forget('blog')}}
          @endif 
              <input type="hidden" name="" value="{{Session::regenerate()}}">
              {{Session::put('blog', 'true')}}
    @endif

        <input type="text" 
        @if($view_name == 'games_body') 
          name="games_search" placeholder="find your favourite game.."
        @elseif($view_name == 'blogs_body')
          name="blogs_search" placeholder="find your favourite blog.."
        @elseif($view_name == 'game_search_result_body')
          name="games_search" placeholder="find your favourite game.."
        @else  
          name="blogs_search" placeholder="find your favourite blog.."
        @endif
          class="searchbtn">
       </form>
       @endif
   <div class="row">
      <div class="col-md-4 col-sm-8 sidebar1">
          <div class="right-navigation">
              <ul class="list">
                  <h4><strong>RECENT GAMES</strong></h4>
                  @foreach($videos as $video)
                    <li><a href="{{ url('game/'.$video->id.'/'. str_replace(' ', '-', $video->titleFUser)) }}">
                    {{str_replace('-', ' ', $video->titleFUser)}}</a></li>
                  @endforeach
              </ul>

              <br>

              <ul class="list">
                  <h4><strong>RECENT POSTS</strong></h4>
                  @foreach($blogs as $blog)
                    <li><a href="{{ url('blog/'.$blog->id.'/'. str_replace(' ', '-', $blog->titleF_User)) }}">
                    {{str_replace('-', ' ', $blog->titleF_User)}}</a></li>
                  @endforeach
              </ul>

              <br>

              <ul class="list">
               <h4><strong>RECENT COMMENTS</strong></h4>
                  @foreach($comments as $comment)
                   @if(preg_match("/^[آ ا ب پ ت ث ج چ ح خ د ذ ر ز ژ س ش ص ض ط ظ ع غ ف ق ک گ ل م ن و ه ی]/", $comment->content))
                     <style>
                     .list> li {
                         font-family: 'BTabassom';
                         font-size: 1.5em;
                     }
                     </style>
                   @endif
                  <li>
                  <a href="{{ url('blog/'.$blog->id.'/'. str_replace(' ', '-', $comment->news_titleF_User)) }}">
                  {!! str_limit($comment->content, 15,' ....') !!}</a></li>
                  @endforeach
              </ul>
              <style>
                 .list>li:hover {
                      background-color: rgba(255, 255, 255, 0.2);
                      border-left: 5px solid white;
                      color: white;
                      font-weight: bolder;
                      padding-left: 35px;
                  }
              </style>
          </div>
      </div>
   </div>
</div> -->



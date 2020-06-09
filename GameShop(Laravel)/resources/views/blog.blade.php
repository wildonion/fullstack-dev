@extends('layouts.welcome')

@section('content')
@include('layouts.panelhead')
<!-- user ip  Request::ip() or $_SERVER['REMOTE_ADDR'] or Request::getClientIp(true)-->
<input type="hidden"  name="user_ip" id="user_ip" value="{{Request::ip()}}">

<div class="single">
   <div class="container">
      <div class="col-md-8 single-main">         
        <div class="single-grid">
          <div class="page-header">
          <!-- ======================================================== -->
                <!-- if user's ip was for IR -->
              <h1 align="center">{{str_replace('-', ' ', $news->title)}}</h1>
                <!-- if user's ip was foreign -->
             <!-- <h1 align="center">{{str_replace('-', ' ', $news->titleF_User)}}</h1> -->
          <!-- ======================================================== -->
          </div>
          @if($news->blog_video != '')
            <video class="mejs__player responsive-video" controls preload="auto" 
            poster="/uploads/images/news/{{ $news->picture }}" 
            width="669" height="320">
              <source src="/uploads/images/news/videos/{{ $news->blog_video }}" type="video/mp4" />
            </video>  
          @else
          <img src="/uploads/images/news/{{$news->picture}}" 
                alt="{{$news->title}}" width="669" height="320" class="img-responsive" />
          @endif
          <!-- ======================================================== -->
                   <!-- if user's ip was for IR -->
                     <p>{!! $news->description !!}</p>
                   <!-- if user's ip was foreign --> 
                     <!-- <p>{!! $news->descriptionF_User !!}</p> -->
          <!-- ======================================================== -->

    <div class="table-responsive">
      <table class="table">
        <tbody>
          <tr>
            <td>
               <a href="{{url('download/video-blog', $news->id)}}" title="دانلود" class="fa fa-download"></a>
            </td>
            <td>
              <a href="javascript:void(0)" title="بازدید کنندگان" class="fa fa-eye"></a>  {{Counter::showAndCount('blog', $news->id)}}
            </td>
          </tr>
          <tr>
            <td>
              <a href="javascript:void(0)" title="آپلود شده" class="fa fa-cloud-upload"></a>  {{\Carbon\Carbon::parse($news->created_at)->diffForHumans()}}
            </td>
            <td>
              <a href="javascript:void(0)" title="ویرایش شده" class="fa fa-pencil-square-o"></a> {{\Carbon\Carbon::parse($news->updated_at)->diffForHumans()}}
            </td>
          </tr>
          <tr>
            <td>
            <div href="javascript:void(0);" id="{{$news->id}}" 
               class="fa fa-thumbs-o-up like" style="cursor: pointer;" 
               data-style="slide-right" data-size="l"></div> <span id="n_likes"></span>
            </td>
            <td>
                @if (count($comments) != 0)
                   <a href="javascript:void(0)" title="پیام ها" class="fa fa-comments"></a> {{count($comments)}}
                @else
                  <a href="javascript:void(0)" title="پیام ها" class="fa fa-comments"></a> 0
                @endif
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

<!-- ============================================================================================-->
    @if (count($b_comments) != 0)
       <ul class="comment-list">
        @foreach ($b_comments as $comment)
         @if(preg_match("/^[آ ا ب پ ت ث ج چ ح خ د ذ ر ز ژ س ش ص ض ط ظ ع غ ف ق ک گ ل م ن و ه ی]/", $comment->content))
             @if(
              preg_match("/^[آ ا ب پ ت ث ج چ ح خ د ذ ر ز ژ س ش ص ض ط ظ ع غ ف ق ک گ ل م ن و ه ی]/", $comment->name))
              <h5 class="post-author_head" style="text-align: right !important;">
                دریافتی از {{$comment->name}} 
              </h5>
              @else
              <h5 class="post-author_head" style="text-align: right !important;">
                 {{$comment->name}} دریافتی از 
              </h5>
              @endif
              <h6 class="post-author_head" style="text-align: right !important;">{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</h6>
            <li><img src="/avatar.png" class="img-responsive" alt="user avatar" style="float: right !important;">
            <div class="desc" style="float: right !important; margin-right: 15px;">
               <p>@emojione($comment->content)</p>
             </div>
             </li>
          @else
            @if(
              preg_match("/^[آ ا ب پ ت ث ج چ ح خ د ذ ر ز ژ س ش ص ض ط ظ ع غ ف ق ک گ ل م ن و ه ی]/", $comment->name))
             <h5 class="post-author_head">Written by {{$comment->name}}</h5>
             <h6 class="post-author_head">{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</h6>
            @else
             <h5 class="post-author_head">Written by {{$comment->name}}, {{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}} </h5>
            @endif
            <li><img src="/avatar.png" class="img-responsive" alt="user avatar">
            <div class="desc">
               <p>@emojione($comment->content)</p>
             </div>
          @endif
             <div class="clearfix"></div>
             </li>
             <hr>
       @endforeach
       </ul>
    @endif
  
<!-- ============================================================================================-->
        <!-- if user's ip was for IR -->
<div class="content-form">
    @foreach(['danger', 'info', 'success'] as $msg)
        @if(Session::has('alert-' . $msg))
            <div class="alert alert-{{$msg}}" dir="rtl">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  {{Session::get('alert-' . $msg)}} 
            </div>
        @endif
    @endforeach

       <h3 dir="rtl">حرفی داری بزن @emojione(':wink:')</h3>
      <form method="POST" action="{{ url('comment/post') }}">
                 {{ csrf_field() }}
        <input type="hidden" name="user_ip" id="user_ip" value="{{Request::ip()}}">
        <input type="hidden" name="agent_info" value="{{Request::header('User-Agent')}}">
        <input type="hidden" name="news_id" value="{{encrypt($news->id)}}">
        <input type="hidden" name="news_title" value="{{$news->title}}">
        <input type="hidden" name="news_titleF_User" value="{{$news->titleF_User}}">
        <input id="name" type="text" name="name" value="{{ old('name') }}" 
        placeholder="نام" required dir="rtl" />
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
        <input id="email" type="text" name="email" value="{{ old('email') }}" 
        placeholder="ایمیل (برای دیگران نشان داده نخواهد شد)" required dir="rtl"/>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <textarea placeholder="حرف شما" id="content" 
        name="content" dir="rtl"></textarea>
         @if ($errors->has('content'))
            <span class="help-block">
                <strong>{{ $errors->first('content') }}</strong>
            </span>
        @endif
        <input type="submit" value="بفرست" style="float: right !important;" />
       </form>
 </div>
<!-- ================================================================================================ -->
<!-- if user's ip was foreign -->
<!-- <div class="content-form">  
      @if(Session::has('alert-success'))
          <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Your comment will be displayed after approval by me 
          </div>
      @endif
         <h3>Wanna Say Something @emojione(':wink:')</h3>
        <form method="POST" action="{{ url('comment/post') }}">
                   {{ csrf_field() }}
          <input type="hidden" name="user_ip" id="user_ip" value="{{Request::ip()}}">
          <input type="hidden" name="agent_info" value="{{Request::header('User-Agent')}}">
          <input type="hidden" name="news_id" value="{{$news->id}}">
          <input type="hidden" name="news_title" value="{{$news->title}}">
          <input type="hidden" name="news_titleF_User" value="{{$news->titleF_User}}">
          <input id="name" type="text" name="name" value="{{ old('name') }}" 
          placeholder="Name" required />
          @if ($errors->has('name'))
              <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
          <input id="email" type="text" name="email" value="{{ old('email') }}" 
          placeholder="Email (will not be publicly displayed)" required/>
          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
          <textarea placeholder="Your Message" id="content" 
          name="content"></textarea>
           @if ($errors->has('content'))
              <span class="help-block">
                  <strong>{{ $errors->first('content') }}</strong>
              </span>
          @endif
          <input type="submit" value="Send" />
         </form>
</div> -->
<!-- ================================================================================================ -->
      </div>
        @include('right_panel')
        <div class="clearfix"></div>
      </div>
    </div>
@endsection



                     
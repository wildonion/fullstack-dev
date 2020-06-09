@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Info About This Blog</div>
                  <div class="panel-body">

                  <div style="text-align: center;">

                   <div class="alert alert-info">
                   <strong>{{str_replace('-', ' ', $news->title)}}</strong>
                   </div>
                   <h6 align="center">Posted {{\Carbon\Carbon::parse($news->created_at)->diffForHumans()}} With 
                    <span class="badge">{{Counter::showAndCount('blog', $news->id)}}</span>  
                          <div class="label label-info">VISITORS</div>

                   @if($news->blog_video != '')
                      <div align="center" style="margin-top: 5px;">
                        <video controls preload="auto" 
                        poster="/uploads/images/news/{{ $news->picture }}" 
                        width="600" height="400" style="max-width: 100%;height: auto;">
                          <source 
                            src="/uploads/images/news/videos/{{ $news->blog_video }}" type="video/mp4" />
                        </video>
                      </div>
                    @else
                     <img src="/uploads/images/news/{{$news->picture}}" 
                        alt="{{$news->title}}" width="669" height="320" class="img-responsive" />
                    @endif
                    
                        
                        <div class="well well-lg" style="margin-top: 5px;">
                          <p>
                            <div>{!! $news->description !!}</div>
                         </p>
                        </div>

                        

                 </div>
            </div>
        </div>
    </div>
</div>
@endsection

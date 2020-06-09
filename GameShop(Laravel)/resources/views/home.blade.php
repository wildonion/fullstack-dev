@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard
                 <span style="color: red; font-weight: bold;"> [ </span>
                            all visitors for the past 7 days 
                       <span class="badge">{{ Counter::allHits(7) }}</span>
                 <span style="color: red; font-weight: bold;"> ] </span>
                </div>
                <div class="panel-body">
                @foreach(['danger', 'info', 'success'] as $msg)
                    @if(Session::has('alert-' . $msg))
                        <div class="alert alert-{{$msg}}">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              {{Session::get('alert-' . $msg)}} 
                        </div>
                    @endif
                @endforeach
                    <div><a href="{{route('games.index')}}">Video Games Managment (portfolio)</a></div>
                    <div><a href="{{route('comments.index')}}">Comments Managment</a></div>
                    <div><a href="{{url('welcome-page-settings/blogs/show')}}">‌Blog Managment</a></div>
                    <div><a href="{{url('shop-store/settings', Auth::user()->id)}}">Shop Store Settings</a></div>
                    <div><a href="{{route('welcome-page-settings.index')}}">Welcome Page Settings</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Available Comments</div>
                <div class="panel-body">
                      <form class="form-horizontal" action="{{url('comments/truncate')}}" method="post">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-warning" onclick="return confirm('Are you sure to delete all data');" name="name" value="Truncate Table">
                      </form>
                <div style="text-align: center;">
                    <div class="pagination pagination-sm">
                        @foreach ($comments as $comment)

                        <div class="page-header">
                            @if (strpos($comment->content, '*') !== false) 
                              <h5 class="label label-danger">swearing text has been detected</h5>
                            @endif
                            <div><strong>Status:</strong> {{ $comment->status }}</div>
                            <div><strong>Name:</strong> {{ $comment->name }}</div>
                            <div><strong>E-Mail:</strong> {{ $comment->email }}</div>
                            <div><strong>IP Address:</strong> {{ $comment->user_ip }}</div>
                            <div><strong>User Agent Info:</strong> {{ $comment->agent_info }}</div>
                            <div><strong>Comment:</strong> 
                            <div><strong>Posted:</strong> {{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</div>
                            <div class="well well-lg">@emojione($comment->content)</div>
                            </div>
                            <div>about: 
                            <a href="{{url('welcome-page-settings/blog/show', $comment->news_ID)}}">
                            blog {{$comment->news_ID}}</a></div>
                            <form class="" action="{{route('comments.destroy',$comment->id)}}" method="post">
                                  <input type="hidden" name="_method" value="delete">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <a href="{{route('comments.edit', $comment->id)}}" class="btn btn-primary">Edit</a>
                                  <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data');" name="name" value="delete">
                            </form>
                        </div>
                        @endforeach

                        {{ $comments->links() }}
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Section</div>
                 <div class="panel-body">
                  @foreach(['danger', 'info', 'success'] as $msg)
                      @if(Session::has('alert-' . $msg))
                          <div class="alert alert-{{$msg}}">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{Session::get('alert-' . $msg)}} 
                          </div>
                      @endif
                  @endforeach
                  
                        @if ($comment->status == 0)
                          <p class="bg-warning">you may want to approve this comment!</p>
                          <form class="form-horizontal" 
                          action="{{url('comments/updatestatus',$comment->id)}}" method="post">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="hidden" name="comment_status" value="{{$comment->status}}">
                                <div class="form-group">
                                  <div class="col-md-8 col-md-offset-2">
                                      <button type="submit" class="btn btn-primary">
                                          Approve
                                      </button>
                                  </div>
                                </div>
 
                          </form>
                        @endif  

                        @if ($comment->status == 1)
                          <p class="bg-success">this comment hasbeen aproved!</p>
                        @endif

                        

                    <form class="form-horizontal" role="form" method="POST" 
                    action="{{ url('comments/update', $comment->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content" class="col-md-2 control-label">Comment</label>

                           <div class="col-md-12">
                            <div>Posted {{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</div>
                            @if(preg_match("/^[آ ا ب پ ت ث ج چ ح خ د ذ ر ز ژ س ش ص ض ط ظ ع غ ف ق ک گ ل م ن و ه ی]/", $comment->content))
                                <textarea id="content" name="comment_description" dir="rtl" 
                                class="form-control" autofocus>{{$comment->content}}</textarea>
                            @else 
                             <textarea id="content" name="comment_description"
                                class="form-control" autofocus>{{$comment->content}}</textarea>
                            @endif

                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-1">
                                <button type="submit" class="btn btn-primary">
                                    Update Comment
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

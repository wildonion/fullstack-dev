@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Here You Can Update Your Meta Tags For All Note Single Pages</div>
                <div class="panel-body">
				   @foreach(['danger', 'info', 'success'] as $msg)
                      @if(Session::has('alert-' . $msg))
                          <div class="alert alert-{{$msg}}">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{Session::get('alert-' . $msg)}} 
                          </div>
                      @endif
                  @endforeach
                <span class="help-block" style="margin: 10px; text-align: center;">
                    <strong>Separate your keywords by ","</strong>
                </span>
           	@foreach($tags as $tag)
              <form class="form-horizontal" role="form" method="POST" 
                     action="{{ url('welcome-page-settings/tags/update', Auth::user()->id ) }}"
                     enctype="multipart/form-data">
                                            {{ csrf_field() }}
                             <input type="hidden" name="page" value="{{$tag->page}}">
                             <h5 class="label label-danger">{{$tag->page}}</h5>

                    <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                        <label for="tags" style="float: right;"
                        class="col-md-2 control-label">Keywords(IR)</label>

                        <div class="col-md-12">
                                <input dir="rtl" type="text" name="tags" id="tags" 
                                 value="{{$tag->tags}}" class="form-control" autofocus>
                            @if ($errors->has('tags'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong>{{ $errors->first('tags') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('meta_desc') ? ' has-error' : '' }}">
                        <label for="meta_desc" style="float: right;"
                        class="col-md-2 control-label">Description(IR)</label>

                        <div class="col-md-12">
                          <textarea style="float: right;" dir="rtl" name="meta_desc" 
                            id="meta_desc" autofocus>{{$tag->meta_desc}}</textarea> 
                            @if ($errors->has('meta_desc'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong>{{ $errors->first('meta_desc') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
  
                    <div class="form-group{{ $errors->has('tagsF_User') ? ' has-error' : '' }}">
                        <label for="tagsF_User" class="col-md-2 control-label">Keywords(F_User)</label>

                        <div class="col-md-12">
                                <input type="text" name="tagsF_User" id="tagsF_User" 
                                 value="{{$tag->tagsF_User}}" class="form-control" autofocus>
                            @if ($errors->has('tagsF_User'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong>{{ $errors->first('tagsF_User') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('meta_descF_User') ? ' has-error' : '' }}">
                     <label for="meta_descF_User" class="col-md-2 control-label">Description(F_User)</label>

                        <div class="col-md-12">
                          <textarea name="meta_descF_User" 
                            id="meta_descF_User" autofocus>{{$tag->meta_descF_User}}</textarea> 
                            @if ($errors->has('meta_descF_User'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong>{{ $errors->first('meta_descF_User') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                     <div class="form-group">
                        <div class="col-md-6 col-md-offset-1">
                            <button type="submit" class="btn btn-primary">
                                Update Meta
                            </button>
                        </div>
                      </div>

                    </form>

                    <hr>
                   @endforeach
              
           		
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Latest News</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" 
                     action="{{ url('welcome-page-settings/latest-news/update', $news->id ) }}"
                     enctype="multipart/form-data">
                                            {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                        <label for="tags" style="float: right;"
                        class="col-md-2 control-label">Keywords(IR)</label>

                        <div class="col-md-12">
                                <input dir="rtl" type="text" name="tags" id="tags" 
                                 value="{{$news->tags}}" class="form-control" autofocus>
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
                            id="meta_desc" autofocus>{{$news->meta_desc}}</textarea> 
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
                                 value="{{$news->tagsF_User}}" class="form-control" autofocus>
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
                            id="meta_descF_User" autofocus>{{$news->meta_descF_User}}</textarea> 
                            @if ($errors->has('meta_descF_User'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong>{{ $errors->first('meta_descF_User') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title" class="col-md-6 control-label">News-Title(IR)</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" 
                            name="title" value="{{ str_replace('-', ' ', $news->title) }}" required>
                            @if ($errors->has('title'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('titleF_User') ? ' has-error' : '' }}">
                        <label for="titleF_User" class="col-md-6 control-label">News-Title(F_User)</label>

                        <div class="col-md-6">
                            <input id="titleF_User" type="text" class="form-control" 
                            name="titleF_User" value="{{ str_replace('-', ' ', $news->titleF_User) }}" required>
                            @if ($errors->has('titleF_User'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong>{{ $errors->first('titleF_User') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <span id="picselector" style="margin: 10px;">
                            <label class="btn btn-default" for="picture" class="col-md-6 control-label">
                                <input id="picture" name="picture" type="file" style="display:none;">
                                Upload Image
                            </label>
                            @if ($errors->has('picture'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong>{{ $errors->first('picture') }}</strong>
                                </span>
                            @endif
                        </span>

                         <span id="videoselector" style="margin: 10px;">
                            <label class="btn btn-default" for="blog_video" class="col-md-6 control-label">
                                <input id="blog_video" name="blog_video" type="file" style="display:none;">
                                Upload Video
                            </label>
                            @if ($errors->has('blog_video'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong>{{ $errors->first('blog_video') }}</strong>
                                </span>
                            @endif
                            <span class="help-block" style="margin: 10px;">
                                    <strong>The image above is required and will use for your video cover!
                                    those cases that you want to upload a video</strong>
                            </span>
                        </span>

                      @if($news->blog_video != '')
                        <div align="center" style="margin-top: 5px;">
                        <video controls preload="auto" poster="/uploads/images/news/{{ $news->picture }}" 
                         width="600" height="400" style="max-width: 100%;height: auto;">
                          <source 
                            src="/uploads/images/news/videos/{{ $news->blog_video }}" type="video/mp4" />
                        </video>
                        </div>
                       @endif
                     </div>


                          

                    <div class="form-group" align="center">
                        <img src="/uploads/images/news/{{ $news->picture }}" alt="news picture" class="img-thumbnail">
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-2 control-label">Description</label>

                        <div class="col-md-12">
                                <textarea name="description">{{$news->description}}</textarea>
                            @if ($errors->has('description'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                     <hr>
                    <div class="form-group{{ $errors->has('descriptionF_User') ? ' has-error' : '' }}">
                        <label for="descriptionF_User" class="col-md-2 control-label">Description(F_User)</label>

                        <div class="col-md-12">
                                <textarea name="descriptionF_User">{{$news->descriptionF_User}}</textarea>
                            @if ($errors->has('descriptionF_User'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong>{{ $errors->first('descriptionF_User') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                     <div class="form-group">
                        <div class="col-md-6 col-md-offset-1">
                            <button type="submit" class="btn btn-primary">
                                Update News
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

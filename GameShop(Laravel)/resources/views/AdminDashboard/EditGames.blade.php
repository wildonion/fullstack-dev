@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Any Info You Want About Your Game</div>
                  <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" 
                     action="{{ url('game/update', $game->id) }}"
                     enctype="multipart/form-data">
                                            {{ csrf_field() }}
                      <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                        <label for="tags" style="float: right;"
                        class="col-md-2 control-label">Keywords(IR)</label>

                        <div class="col-md-12">
                                <input dir="rtl" type="text" name="tags" id="tags" 
                                 value="{{$game->tags}}" class="form-control" autofocus>
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
                            id="meta_desc" autofocus>{{$game->meta_desc}}</textarea> 
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
                                 value="{{$game->tagsF_User}}" class="form-control" autofocus>
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
                            id="meta_descF_User" autofocus>{{$game->meta_descF_User}}</textarea> 
                            @if ($errors->has('meta_descF_User'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong>{{ $errors->first('meta_descF_User') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title" class="col-md-6 control-label">Title(IR)</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" 
                            name="title" value="{{str_replace('-', ' ', $game->title)}}" required>
                            @if ($errors->has('title'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('caption_n2') ? ' has-error' : '' }}">
                            <label for="caption_n2" class="col-md-6 control-label">Picture 2 Caption(IR)</label>

                            <div class="col-md-6">
                                <input id="caption_n2" type="text" class="form-control" 
                                name="caption_n2" value="{{$game->caption_n2}}">
                                @if ($errors->has('caption_n2'))
                                    <span class="help-block" style="margin: 10px;">
                                        <strong>{{ $errors->first('caption_n2') }}</strong>
                                    </span>
                                @endif
                            </div>
                     </div>

                      <div class="form-group{{ $errors->has('caption_n3') ? ' has-error' : '' }}">
                            <label for="caption_n3" class="col-md-6 control-label">Picture 3 Caption(IR)</label>

                            <div class="col-md-6">
                                <input id="caption_n3" type="text" class="form-control" 
                                name="caption_n3" value="{{$game->caption_n3}}">
                                @if ($errors->has('caption_n3'))
                                    <span class="help-block" style="margin: 10px;">
                                        <strong>{{ $errors->first('caption_n3') }}</strong>
                                    </span>
                                @endif
                            </div>
                       </div>

                        <div class="form-group{{ $errors->has('caption_n4') ? ' has-error' : '' }}">
                            <label for="caption_n4" class="col-md-6 control-label">Picture 4 Caption(IR)</label>

                            <div class="col-md-6">
                                <input id="caption_n4" type="text" class="form-control" 
                                name="caption_n4" value="{{$game->caption_n4}}">
                                @if ($errors->has('caption_n4'))
                                    <span class="help-block" style="margin: 10px;">
                                        <strong>{{ $errors->first('caption_n4') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <hr>

                    <div class="form-group{{ $errors->has('titleF_User') ? ' has-error' : '' }}">
                        <label for="titleF_User" class="col-md-6 control-label">Title(F_User)</label>

                        <div class="col-md-6">
                            <input id="titleF_User" type="text" class="form-control" 
                            name="titleF_User" value="{{str_replace('-', ' ', $game->titleFUser)}}" required>
                            @if ($errors->has('titleF_User'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong>{{ $errors->first('titleF_User') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('caption_n2F_User') ? ' has-error' : '' }}">
                            <label for="caption_n2F_User" class="col-md-6 control-label">Picture 2 Caption(F_User)</label>

                            <div class="col-md-6">
                                <input id="caption_n2F_User" type="text" class="form-control" 
                                name="caption_n2F_User" value="{{$game->caption_n2F_User}}">
                                @if ($errors->has('caption_n2F_User'))
                                    <span class="help-block" style="margin: 10px;">
                                        <strong>{{ $errors->first('caption_n2F_User') }}</strong>
                                    </span>
                                @endif
                            </div>
                     </div>

                      <div class="form-group{{ $errors->has('caption_n3F_User') ? ' has-error' : '' }}">
                            <label for="caption_n3F_User" class="col-md-6 control-label">Picture 3 Caption(F_User)</label>

                            <div class="col-md-6">
                                <input id="caption_n3F_User" type="text" class="form-control" 
                                name="caption_n3F_User" value="{{$game->caption_n3F_User}}">
                                @if ($errors->has('caption_n3F_User'))
                                    <span class="help-block" style="margin: 10px;">
                                        <strong>{{ $errors->first('caption_n3F_User') }}</strong>
                                    </span>
                                @endif
                            </div>
                       </div>

                        <div class="form-group{{ $errors->has('caption_n4F_User') ? ' has-error' : '' }}">
                            <label for="caption_n4F_User" class="col-md-6 control-label">Picture 4 Caption(F_User)</label>

                            <div class="col-md-6">
                                <input id="caption_n4F_User" type="text" class="form-control" 
                                name="caption_n4F_User" value="{{$game->caption_n4F_User}}">
                                @if ($errors->has('caption_n4F_User'))
                                    <span class="help-block" style="margin: 10px;">
                                        <strong>{{ $errors->first('caption_n4F_User') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <hr>

                     <div class="form-group">
                        <span id="picselector1" style="margin: 10px;">
                            <label class="btn btn-default" for="picture_game_n1" class="col-md-6 control-label">
                                <input id="picture_game_n1" name="picture_game_n1" type="file" style="display:none;">
                                Upload Image 1
                            </label>
                            @if ($errors->has('picture_game_n1'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong>{{ $errors->first('picture_game_n1') }}</strong>
                                </span>
                            @endif
                        </span>
                      

                          <div class="form-group" align="center">
                            <img src="/uploads/images/video_games/{{ $game->picture_game_n1 }}" alt="picture1" class="img-thumbnail" width="100" height="100">
                          </div>

                        <span id="picselector2" style="margin: 10px;">
                            <label class="btn btn-default" for="picture_game_n2" class="col-md-6 control-label">
                                <input id="picture_game_n2" name="picture_game_n2" type="file" style="display:none;">
                                Upload Image 2
                            </label>
                            @if ($errors->has('picture_game_n2'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong>{{ $errors->first('picture_game_n2') }}</strong>
                                </span>
                            @endif
                        </span>
                        <input type="checkbox" value="{{$game->picture_game_n2_status}}" 
                  name="picture_game_n2_check"
                  @if ($game->picture_game_n2_status == 1) checked="checked" @endif>

                         <div class="form-group" align="center">
                            <img src="/uploads/images/video_games/{{ $game->picture_game_n2 }}" alt="picture2" class="img-thumbnail" width="100" height="100">
                         </div>

                        <span id="picselector3" style="margin: 10px;">
                            <label class="btn btn-default" for="picture_game_n3" class="col-md-6 control-label">
                                <input id="picture_game_n3" name="picture_game_n3" type="file" style="display:none;">
                                Upload Image 3
                            </label>
                            @if ($errors->has('picture_game_n3'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong>{{ $errors->first('picture_game_n3') }}</strong>
                                </span>
                            @endif
                        </span>
                        <input type="checkbox" value="{{$game->picture_game_n3_status}}" 
                  name="picture_game_n3_check"
                  @if ($game->picture_game_n3_status == 1) checked="checked" @endif>

                         <div class="form-group" align="center">
                            <img src="/uploads/images/video_games/{{ $game->picture_game_n3 }}" alt="picture3" class="img-thumbnail" width="100" height="100">
                         </div>

                        <span id="picselector4" style="margin: 10px;">
                            <label class="btn btn-default" for="picture_game_n4" class="col-md-6 control-label">
                                <input id="picture_game_n4" name="picture_game_n4" type="file" style="display:none;">
                                Upload Image 4
                            </label>
                            @if ($errors->has('picture_game_n4'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong>{{ $errors->first('picture_game_n4') }}</strong>
                                </span>
                            @endif
                        </span>
                        <input type="checkbox" value="{{$game->picture_game_n4_status}}" 
                  name="picture_game_n4_check"
                  @if ($game->picture_game_n4_status == 1) checked="checked" @endif>

                         <div class="form-group" align="center">
                            <img src="/uploads/images/video_games/{{ $game->picture_game_n4 }}" alt="picture4" class="img-thumbnail" width="100" height="100">
                         </div>

                       </div>
                        
                      <div class="form-group">
                        <span id="picselector5" style="margin: 10px;">
                            <label class="btn btn-default" for="picture_game_n5" class="col-md-6 control-label">
                                <input id="picture_game_n5" name="picture_game_n5" type="file" style="display:none;">
                                Upload Image 5
                            </label>
                            @if ($errors->has('picture_game_n5'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong>{{ $errors->first('picture_game_n5') }}</strong>
                                </span>
                            @endif
                        </span>
                        <input type="checkbox" value="{{$game->picture_game_n5_status}}" 
                  name="picture_game_n5_check"
                  @if ($game->picture_game_n5_status == 1) checked="checked" @endif>

                        <div class="form-group" align="center">
                            <img src="/uploads/images/video_games/{{ $game->picture_game_n5 }}" alt="picture5" class="img-thumbnail" width="100" height="100">
                         </div>

                        <span id="picselector6" style="margin: 10px;">
                            <label class="btn btn-default" for="picture_game_n6" class="col-md-6 control-label">
                                <input id="picture_game_n6" name="picture_game_n6" type="file" style="display:none;">
                                Upload Image 6
                            </label>
                            @if ($errors->has('picture_game_n6'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong>{{ $errors->first('picture_game_n6') }}</strong>
                                </span>
                            @endif
                        </span>
                        <input type="checkbox" value="{{$game->picture_game_n6_status}}" 
                  name="picture_game_n6_check"
                  @if ($game->picture_game_n6_status == 1) checked="checked" @endif>

                         <div class="form-group" align="center">
                            <img src="/uploads/images/video_games/{{ $game->picture_game_n6 }}" alt="picture6" class="img-thumbnail" width="100" height="100">
                         </div>
                       </div>

                          <div align="center">
                            <video width="320" height="240" controls poster="/uploads/images/video_games/{{ $game->picture_game_n1 }}" style="max-width: 100%;height: auto;">
                              <source src="/uploads/videos/{{ $game->video_game }}" type="video/mp4"  >
                            </video>
                          </div>
                            
                          <div class="form-group" align="center">
                            <span id="videoselector" style="margin: 10px;">
                                <label class="btn btn-default" for="video_game" class="col-md-6 control-label">
                                    <input id="video_game" name="video_game" type="file" style="display:none;">
                                    Upload Video
                                </label>
                                @if ($errors->has('video_game'))
                                    <span class="help-block" style="margin: 10px;">
                                        <strong>{{ $errors->first('video_game') }}</strong>
                                    </span>
                                @endif
                            </span>
                        </div>

                        
                        <hr>
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-6 control-label">Description About Your Game</label>

                        <div class="col-md-12">
                                <textarea name="description">{{$game->description}}</textarea>
                            @if ($errors->has('description'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="form-group{{ $errors->has('descriptionF_User') ? ' has-error' : '' }}">
                        <label for="descriptionF_User" class="col-md-6 control-label">Description About Your Game(F_User)</label>

                        <div class="col-md-12">
                                <textarea name="descriptionF_User">{{$game->descriptionFUser}}</textarea>
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
                                Update Game
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

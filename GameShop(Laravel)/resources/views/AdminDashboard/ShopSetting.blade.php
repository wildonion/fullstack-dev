@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">You Can Active Your Shop Store Or Deactive it Here</div>
                <div class="panel-body">

                    @if ($shop->status == 1)
                    <form class="form-horizontal" role="form" method="POST" 
                     action="{{ url('shop-store/setting/update/disableshop', Auth::user()->id) }}"
                     enctype="multipart/form-data">
                                            {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title" class="col-md-6 control-label">Title(IR)</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" 
                            name="title" value="{{ $shop->title }}" required>
                            @if ($errors->has('title'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('titleF_User') ? ' has-error' : '' }}">
                        <label for="titleF_User" class="col-md-6 control-label">Title(F_User)</label>

                        <div class="col-md-6">
                            <input id="titleF_User" type="text" class="form-control" 
                            name="titleF_User" value="{{ $shop->titleF_User }}" required>
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
       
                    </div>

                    <div class="form-group" align="center">
                    <img src="/uploads/images/body_setting/{{ $shop->picture }}" alt="picture here" class="img-thumbnail">
                  </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-2 control-label">Description</label>

                        <div class="col-md-12">
                                <textarea name="description">{{ $shop->description }}</textarea>
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
                                <textarea name="descriptionF_User">{{ $shop->descriptionF_User }}</textarea>
                            @if ($errors->has('descriptionF_User'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong>{{ $errors->first('descriptionF_User') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('expired_at') ? ' has-error' : '' }}">
                        <label for="expired_at" class="col-md-8 control-label">Time Remaining To Run Your Shop Store(Enter a date after now !)</label>

                        <div class="col-md-12">
                                <input type="text" name="expired_at" id="expired_at" 
                                    min="{{\Carbon\Carbon::now()}}" value="{{ $shop->expired_at }}">
                            @if ($errors->has('expired_at'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong>{{ $errors->first('expired_at') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                     <div class="form-group">
                        <div class="col-md-6 col-md-offset-1">
                            <button type="submit" class="btn btn-primary">
                                Deactive Shop Store
                            </button>
                        </div>
                      </div>

                    </form>
                  @endif


                    @if ($shop->status == 0)
                        <form class="form-horizontal" role="form" method="POST" 
                     action="{{ url('shop-store/setting/update/enableshop', Auth::user()->id) }}">
                     {{ csrf_field() }}
                     <div class="form-group">
                        <div class="col-md-6 col-md-offset-5">
                            <button type="submit" class="btn btn-primary">
                                Active Shop Store
                            </button>
                        </div>
                      </div>

                    </form>
                    @endif
           		
           			

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

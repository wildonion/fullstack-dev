@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">Below You Can Update Your Site Brand And Also Add Some Description</div>
                  <div class="panel-body">
           		         

                       <form class="form-horizontal" role="form" method="POST" 
                          action="{{  url('welcome-page-settings/updatebrand', Auth::user()->id) }}" 
                          style="margin-top: 15px;" enctype="multipart/form-data">
                          {{ csrf_field() }}

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
                                <span class="help-block" style="margin: 10px;">
                                        <strong>You can upload an image if you want</strong>
                                </span>
                            </span>
                          </div>

                          <div class="form-group" align="center">
                              <img src="/uploads/images/brand/{{ $brand->picture }}" alt="news picture" class="img-thumbnail">
                          </div>

                           <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
                               <label for="brand" class="col-md-2 control-label">Brand(IR)</label>

                              <div class="col-md-12">

                                  <textarea name="description">{{$brand->brand}}</textarea>

                                  @if ($errors->has('brand'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('brand') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <hr>
                          <div class="form-group{{ $errors->has('brandF_User') ? ' has-error' : '' }}">
                              <label for="brandF_User" class="col-md-2 control-label">Brand(F_User)</label>
                              <div class="col-md-12">

                                  <textarea name="descriptionF_User">{{$brand->brandF_User}}</textarea>

                                  @if ($errors->has('about_me'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('brandF_User') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-2">
                                  <button type="submit" class="btn btn-primary">
                                      Update Brand
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

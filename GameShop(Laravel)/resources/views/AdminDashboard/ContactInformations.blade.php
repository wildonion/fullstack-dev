@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Necessary Informations</div>
                <div class="panel-body">
                    
                    <form class="form-horizontal" role="form" method="POST" 
                    action="{{ url('contact-info/update', Auth::user()->id ) }}" style="margin-top: 15px;" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                    <div class="form-group{{ $errors->has('full_name') ? ' has-error' : '' }}">
                        <label for="full_name" class="col-md-4 control-label">Full Name</label>

                        <div class="col-md-6">
                            <input id="full_name" type="text" class="form-control" name="full_name" value="{{ $aci->full_name }}" required autofocus>

                            @if ($errors->has('full_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('full_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('instagram') ? ' has-error' : '' }}">
                        <label for="instagram" class="col-md-4 control-label">Instagram</label>

                        <div class="col-md-6">
                            <input id="instagram" type="text" class="form-control" name="instagram" value="{{ $aci->instagram }}" required>

                            @if ($errors->has('instagram'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('instagram') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                        <label for="facebook" class="col-md-4 control-label">Facebook</label>

                        <div class="col-md-6">
                            <input id="facebook" type="text" class="form-control" name="facebook" value="{{ $aci->facebook }}" required>

                            @if ($errors->has('facebook'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('facebook') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('gmail') ? ' has-error' : '' }}">
                        <label for="gmail" class="col-md-4 control-label">G-mail</label>

                        <div class="col-md-6">
                            <input id="gmail" type="text" class="form-control" name="gmail" value="{{ $aci->gmail }}" required>

                            @if ($errors->has('gmail'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gmail') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('telegram') ? ' has-error' : '' }}">
                        <label for="telegram" class="col-md-4 control-label">Telegram</label>

                        <div class="col-md-6">
                            <input id="telegram" type="text" class="form-control" name="telegram" value="{{ $aci->telegram }}" required>

                            @if ($errors->has('telegram'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('telegram') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-mail</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $aci->email }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('compony') ? ' has-error' : '' }}">
                        <label for="compony" class="col-md-4 control-label">Compony</label>

                        <div class="col-md-6">
                            <input id="compony" type="text" class="form-control" name="compony" value="{{ $aci->compony }}">

                            @if ($errors->has('compony'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('compony') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <span class="help-block" style="margin: 10px;">
                     <strong>Tell users who you are!(will show in your root page)</strong>
                    </span>
                    <div class="form-group{{ $errors->has('about_me') ? ' has-error' : '' }}">
                        <label for="about_me" class="col-md-4 control-label">About Me(IR)</label>

                        <div class="col-md-12">

                            <textarea name="description">{{$aci->about_me}}</textarea>

                            @if ($errors->has('about_me'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('about_me') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="form-group{{ $errors->has('about_meF_User') ? ' has-error' : '' }}">
                        <label for="about_meF_User" class="col-md-4 control-label">About Me(F_User)</label>

                        <div class="col-md-12">

                            <textarea name="descriptionF_User">{{$aci->about_meF_User}}</textarea>

                            @if ($errors->has('about_me'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('about_meF_User') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                        <label for="phone_number" class="col-md-4 control-label">Phone-Number +98</label>

                        <div class="col-md-6">
                            <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ $aci->phone_number }}">

                            @if ($errors->has('phone_number'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                
                  <div class="form-group" align="center">
                    <img src="/uploads/images/about_admin/{{ $aci->picture }}" alt="your avatar" class="img-thumbnail">
                  </div>

                    <div class="form-group" align="center">
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
                                    <strong>If you want to upload a picture, will use for contact informations</strong>
                            </span>
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-2">
                            <button type="submit" class="btn btn-primary">
                                Submit
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

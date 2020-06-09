@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Footer Setting</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" 
                     action="{{ url('welcome-page-settings/footer/update', Auth::user()->id ) }}"
                     enctype="multipart/form-data">
                                            {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-2 control-label">Description</label>

                        <div class="col-md-12">
                                <textarea name="description">{{$footer->description}}</textarea>
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
                                <textarea name="descriptionF_User">{{$footer->descriptionF_User}}</textarea>
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
                                Update Footer
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

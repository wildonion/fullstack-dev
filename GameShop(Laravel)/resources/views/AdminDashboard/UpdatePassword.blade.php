@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading">Profile Settings</div>
                <div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" 
					 action="{{ url('password/updatepswd', Auth::user()->id) }}">
					                        {{ csrf_field() }}
					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					    <label for="password" class="col-md-4 control-label">New Password</label>

					    <div class="col-md-6">
					        <input id="password" type="password" class="form-control" name="password" required>
					        @if ($errors->has('password'))
					            <span class="help-block">
					                <strong>{{ $errors->first('password') }}</strong>
					            </span>
					        @endif
					        <div class="col-md-6 col-md-offset-12">
						        <button id="pswdeye" onclick="if(password.type=='text')password.type='password'; else password.type='text';">
						         see
		                        </button>
	                        </div>
					    </div>
					</div>

					<div class="form-group">
					    <label for="password-confirm" class="col-md-4 control-label">Confirm New Password</label>

					    <div class="col-md-6">
					        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
					    </div>
					</div>

					 <div class="form-group">
					    <div class="col-md-6 col-md-offset-4">
					        <button type="submit" class="btn btn-primary">
					            Set
					        </button>
					        <button id="GenRanPswdButton" onclick="getElementById('password').value=Math.random().toString(36).substr(2, 8)">Generate Random Password
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
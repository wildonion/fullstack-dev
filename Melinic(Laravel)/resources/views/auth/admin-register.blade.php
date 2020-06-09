@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register New Doctor</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('doctor.register') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div>
                            <input id="doc_picture" name="doc_picture" type="file">
                            @if ($errors->has('doc_picture'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong style="color: red;">{{ $errors->first('doc_picture') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" 
                                name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price_of_free_visit') ? ' has-error' : '' }}">
                            <label for="price_of_free_visit" class="col-md-4 control-label">Price Of Free Visit(TR)</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" 
                               name="price_of_free_visit" value="{{ old('price_of_free_visit') }}" required autofocus>

                                @if ($errors->has('price_of_free_visit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price_of_free_visit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('specialties') ? ' has-error' : '' }}">
                            <label for="specialties" class="col-md-4 control-label">Specialties</label>

                            <div class="col-md-6">
                                <input id="specialties" type="text" class="form-control" 
                             name="specialties" value="{{ old('specialties') }}" required autofocus>

                                @if ($errors->has('specialties'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('specialties') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('doc_description') ? ' has-error' : '' }}">
                            <label for="specialties" class="col-md-4 control-label">About-Doc</label>

                            <div class="col-md-6">

                                <textarea id="doc_description" class="form-control" name="doc_description"></textarea>

                                @if ($errors->has('doc_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('doc_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" 
                                name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('room_to_visit') ? ' has-error' : '' }}">
                            <label for="room_to_visit" class="col-md-4 control-label">Room</label>

                            <div class="col-md-6">
                                <input id="room_to_visit" type="number" min="1" max="12" class="form-control" name="room_to_visit" value="{{ old('room_to_visit') }}" required>

                                @if ($errors->has('room_to_visit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('room_to_visit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('insured_expiration_date') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Insured Expiration Date</label>

                            <div class="col-md-6">
                                <input id="insured_expiration_date" type="text" class="form-control" 
                                name="insured_expiration_date" required>

                                @if ($errors->has('insured_expiration_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('insured_expiration_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Register
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

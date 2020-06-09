@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Profile @if($data['presence_now'] == true)
                            <strong style="color: green;">[Presence]</strong>
                        @else
                            <strong style="color: red;">[Far-Away]</strong>
                        @endif

                        | TOTAL EARN TILL NOW: <strong style="color: blue;">{{$data['total_earn_till_now']}}-TR<strong>
                </div>
                <div class="panel-body">
                @component('components.messages')
                 @endcomponent
                    <form class="form-horizontal" method="POST" action="{{ route('admin.password.submit') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <label class="form-inline">
                            <img src="/uploads/images/{{ $data['doc_picture'] }}" alt="doc_picture" class="img-circle" width="100" height="100">
                         </label>

                         <label class="form-inline"> Update Profile
                            <input id="doc_picture" name="doc_picture" type="file">
                            @if ($errors->has('doc_picture'))
                                <span class="help-block" style="margin: 10px;">
                                    <strong style="color: red;">{{ $errors->first('doc_picture') }}</strong>
                                </span>
                            @endif
                        </label>

                            <label class="radio-inline"><input type="radio" name="presence_now" value="1">Presence</label>
                            <label class="radio-inline"><input type="radio" name="presence_now" value="0">Far-Away</label>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" 
                                value="{{$data['name']}}" name="name" value="{{ old('name') }}" required autofocus>

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
                                value="{{$data['price_of_free_visit']}}" name="price_of_free_visit" value="{{ old('price_of_free_visit') }}" required autofocus>

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
                                value="{{$data['specialties']}}" name="specialties" value="{{ old('specialties') }}" required autofocus>

                                @if ($errors->has('specialties'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('specialties') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('doc_description') ? ' has-error' : '' }}">
                            <label for="specialties" class="col-md-4 control-label">About-Me</label>

                            <div class="col-md-6">

                                <textarea id="doc_description" class="form-control" name="doc_description">{{$data['doc_description']}}</textarea>

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
                                value="{{$data['email']}}" name="email" value="{{ old('email') }}" required>

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
                                <input id="room_to_visit" type="number" min="1" max="12" 
                                value="{{$data['room_to_visit']}}" class="form-control" name="room_to_visit" value="{{ old('room_to_visit') }}" required>

                                @if ($errors->has('room_to_visit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('room_to_visit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">New Password</label>

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
                                value="{{$data['insured_expiration_date']}}" name="insured_expiration_date" required>

                                @if ($errors->has('insured_expiration_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('insured_expiration_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('days') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Days</label>

                            <div class="col-md-6">
                                <input id="days" type="text" class="form-control" 
                                value="{{$data['doctor_presence_days']}}" name="days" required>

                                @if ($errors->has('days'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('days') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('from') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">From</label>

                            <div class="col-md-6">
                                <input id="from" type="text" class="form-control" 
                                value="{{$data['doctor_presence_from']}}" name="from" required>

                                @if ($errors->has('from'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('from') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('till') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Till</label>

                            <div class="col-md-6">
                                <input id="till" type="text" class="form-control" 
                                value="{{$data['doctor_presence_till']}}" name="till" required>

                                @if ($errors->has('till'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('till') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
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

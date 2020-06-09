@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                <form class="form-horizontal" method="POST" action="{{ route('admin.insaddress.submit') }}">
                        {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="specialties" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">

                                <textarea id="address" class="form-control" name="address"></textarea>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                            <label for="phone_number" class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control" 
                             name="phone_number" value="{{ old('phone_number') }}" required autofocus>

                                @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    ADD
                                </button>
                            </div>
                    </div>

                </form>
                    
                    @foreach ($addresses as $adr)

                        <div class="page-header">
                            <form class="form-horizontal" method="POST" action="{{ route('admin.upaddress.submit') }}">
                                    {{ csrf_field() }}

                            <input type="hidden" name="address_id" value="{{$adr->id}}">
                            
                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                        <label for="specialties" class="col-md-4 control-label">Address</label>

                                        <div class="col-md-6">

                                            <textarea id="address" class="form-control" name="address">{{$adr->address}}</textarea>

                                            @if ($errors->has('address'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                </div>

                                <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                        <label for="phone_number" class="col-md-4 control-label">Phone Number</label>

                                        <div class="col-md-6">
                                            <input id="phone_number" type="text" class="form-control" 
                                         name="phone_number" value="{{$adr->phone_number}}" required autofocus>

                                            @if ($errors->has('phone_number'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                </div>

                                <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-success">
                                                Edit
                                            </button>
                                        </div>
                                </div>

                            </form>
                        </div>

                    @endforeach
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{config('app.name')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <h1 align="center">WELCOME TO MELINIC</h1>
                    @if (Auth::guard('admin')->check())
                     <div align="center">
                        <a href="{{ url('/admin') }}">DOCTOR-PANEL</a>
                    </div>
                    @endif

                    @if (Auth::guard('web')->check())
                    <div align="center">
                        <a href="{{ route('main') }}">SECRETARY-PANEL</a>
                    </div>
                    @endif
        <div class="flex-center position-ref full-height">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-heading">Register</div>
                                <div class="panel-body">
                            @if(Auth::guard('web')->check())
                                
                                   <form class="form-horizontal" method="POST" action="{{ route('patient.new.submit') }}">
                                            {{ csrf_field() }}



                            <label class="radio-inline"><input type="radio" name="sex" value="1">Male</label>
                            <label class="radio-inline"><input type="radio" name="sex" value="0">Female</label>
                            <label class="radio-inline"><input type="radio" name="insured" value="1">Has Insured</label>
                            <label class="radio-inline"><input type="radio" name="insured" value="0">Doesn't</label>
                            <label class="radio-inline"><input type="radio" name="disease_experience" value="1">Has Disease Experience</label>
                            <label class="radio-inline"><input type="radio" name="disease_experience" value="0">Doesn't</label>




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

                                            <div class="form-group{{ $errors->has('issued') ? ' has-error' : '' }}">
                                                <label for="issued" class="col-md-4 control-label">Issued</label>

                                                <div class="col-md-6">
                                                    <input id="issued" type="text" class="form-control" 
                                                   name="issued" value="{{ old('issued') }}" required autofocus>

                                                    @if ($errors->has('issued'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('issued') }}</strong>
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

                                            <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                                                <label for="age" class="col-md-4 control-label">Age</label>

                                                <div class="col-md-6">
                                                    <input id="age" type="number" min="1" max="100" class="form-control" name="age" value="{{ old('age') }}" required>

                                                    @if ($errors->has('age'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('age') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="form-group{{ $errors->has('insured_expiration_date') ? ' has-error' : '' }}">
                                                <label for="insured_expiration_date" class="col-md-4 control-label">Insured Expiration Date</label>

                                                <div class="col-md-6">
                                                    <input id="insured_expiration_date" type="text" class="form-control" 
                                                    name="insured_expiration_date" required>

                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('kind_of_insured') ? ' has-error' : '' }}">
                                                <label for="kind_of_insured" class="col-md-4 control-label">Kind Of Insured</label>

                                                <div class="col-md-6">
                                                    <input id="kind_of_insured" type="text" class="form-control" 
                                                    name="kind_of_insured" required>

                                                    @if ($errors->has('kind_of_insured'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('kind_of_insured') }}</strong>
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


                                
                            @else
                                
                                     <pre>ACCESS DENIED FOR ALL CLERKS</pre>
                                     <a href="{{ url('login') }}">Login</a>
                                     <a href="{{ url('register') }}">Register</a>
                                
                            @endif

                        </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

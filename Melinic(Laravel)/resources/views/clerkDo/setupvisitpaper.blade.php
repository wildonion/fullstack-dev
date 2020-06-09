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
                    <br><br>
                    @endif

                    @if (Auth::guard('web')->check())
                    <div align="center">
                        <a href="{{ route('main') }}">SECRETARY-PANEL</a>
                    </div>
                    <br><br>
                    @endif
        <div class="flex-center position-ref full-height" style="margin-top: 2px;>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Doctors</div>
                                <div class="panel-body">
                                @if(Auth::guard('web')->check())
                                    
                                    @foreach($doctors as $docy)
                                        DOCTOR ID: <strong>{{$docy->id}}</strong><br>
                                        DOCTOR NAME: <strong>{{$docy->name}}</strong><br>
                                        DOCTOR SPECIALTIES: <strong>{{$docy->specialties}}</strong><br>
                                        FREE VISIT PRICE: <strong>{{$docy->price_of_free_visit}} - TR</strong><br>
                                        DOCTOR ROOM: <strong>{{$docy->room_to_visit}}</strong>
                                       
                                        <hr>
                                    @endforeach

                                    

                                    
                                @else
                                    
                                         <pre>ACCESS DENIED FOR ALL CLERKS</pre>
                                         <a href="{{ url('login') }}">Login</a>
                                         <a href="{{ url('register') }}">Register</a>
                                    
                                @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Patients <strong><a href="{{route('patient.search.show')}}">Search For Patients</a></strong></div>
                                <div class="panel-body">
                                @if(Auth::guard('web')->check())
                                    
                                    @foreach($patients as $p)
                                        PATIENT ID: <strong>{{$p->id}}</strong><br>
                                        PATIENT NAME: <strong>{{$p->name}}</strong><br>
                                        PATIENT TOKEN: <strong>{{$p->doc_token}}</strong><br>
                                        PATIENT SEX: <strong>{{$p->sex}}</strong><br>
                                        PATIENT KIND OF INSURED: <strong>{{$p->kind_of_insured}}</strong>
                                        <hr>
                                    @endforeach

                                    
                                @else
                                    
                                         <pre>ACCESS DENIED FOR ALL CLERKS</pre>
                                         <a href="{{ url('login') }}">Login</a>
                                         <a href="{{ url('register') }}">Register</a>
                                    
                                @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">

                        <form class="form-horizontal" method="POST" action="{{ route('patient.new.visit.add') }}">
                                            {{ csrf_field() }}

                                            <div class="form-group{{ $errors->has('doctor_id') ? ' has-error' : '' }}">
                                                <label for="name" class="col-md-4 control-label">Doctor ID</label>

                                                <div class="col-md-6">
                                                    <input id="doctor_id" type="text" class="form-control" 
                                                    name="doctor_id" value="{{ old('doctor_id') }}" required autofocus>

                                                    @if ($errors->has('doctor_id'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('doctor_id') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('patient_id') ? ' has-error' : '' }}">
                                                    <label for="patient_id" class="col-md-4 control-label">PaTient ID</label>

                                                    <div class="col-md-6">

                                                        <input id="patient_id" type="text" class="form-control" 
                                                    name="patient_id" value="{{ old('patient_id') }}" required autofocus>

                                                        @if ($errors->has('patient_id'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('patient_id') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('room') ? ' has-error' : '' }}">
                                                <label for="room" class="col-md-4 control-label">Room</label>

                                                <div class="col-md-6">
                                                    <input id="room" type="text" class="form-control" 
                                                   name="room" value="{{ old('room') }}" required autofocus>

                                                    @if ($errors->has('room'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('room') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="form-group{{ $errors->has('total_price') ? ' has-error' : '' }}">
                                                <label for="total_price" class="col-md-4 control-label">Visit Price</label>

                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control" 
                                                    name="total_price" value="{{ old('total_price') }}" 
                                                    placeholder="doctor free visit price" required autofocus>

                                                    @if ($errors->has('total_price'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('total_price') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            

                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-4">
                                                    <button type="submit" class="btn btn-success">
                                                        Save Visit
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                            </div>
                </div>
            </div>
        </div>
    </body>
</html>

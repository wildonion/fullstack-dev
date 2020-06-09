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
                @component('components.messages')
                 @endcomponent
        <div class="flex-center position-ref full-height">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Patient Prescription</div>
                                <div class="panel-body">
                                @if(Auth::guard('admin')->check())
                                    
                                <form class="form-horizontal" method="POST" action="{{ route('pastient.now.submit.prescription') }}">
                                             {{ csrf_field() }} <!-- cause we're using web middleware -->

                                            <div class="form-group{{ $errors->has('doctor_id') ? ' has-error' : '' }}">
                                                <label for="name" class="col-md-4 control-label">Your ID</label>

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

                                            <div class="form-group{{ $errors->has('prescription') ? ' has-error' : '' }}">
                                                <label for="prescription" class="col-md-4 control-label">Prescription</label>

                                                <div class="col-md-6">

                                                    <textarea id="prescription" class="form-control" name="prescription"></textarea>

                                                    @if ($errors->has('prescription'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('prescription') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-4">
                                                    <button type="submit" class="btn btn-success">
                                                        Save Prescription
                                                    </button>
                                                </div>
                                            </div>
                                 </form>
                                    
                                    
                                @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="panel panel-default">
                                <div class="panel-heading">Patient Info</div>
                                <div class="panel-body">
                                    
                                    @if(Session::get('turning_number'))
                                        <strong>TURNING-NUMBER: </strong><span class="text-danger">{{Session::get('turning_number')}}</span></br>
                                    @endif
                                    @if(Session::get('total_price'))
                                        <strong>TOTAL-PRICE TO PAID: </strong><span class="text-danger">{{Session::get('total_price')}}-TR</span></br>
                                    @endif
                                    @if(Session::get('kind_of_insured'))
                                        <strong>INSURED: </strong><span class="text-danger">{{Session::get('kind_of_insured')}}</span></br>
                                    @endif
                                    @if(Session::get('room'))
                                        <strong>ROOM: </strong><span class="text-danger">{{Session::get('room')}}</span></br>
                                    @endif
                                    @if(Session::get('doctor_specialties'))
                                        <strong>SPECIALTIES: </strong><span class="text-danger">{{Session::get('doctor_specialties')}}</span></br>
                                    @endif
                                    @if(Session::get('patient_id'))
                                        <strong>PATIENT ID: </strong><span class="text-danger">{{Session::get('patient_id')}}</span></br>
                                    @endif
                                    @if(Session::get('patient_token'))
                                        <strong>PATIENT DOC TOKEN: </strong><span class="text-danger">{{Session::get('patient_token')}}</span></br>
                                    @endif
                                    @if(Session::get('doctor_id'))
                                        <strong>YOUR ID: </strong><span class="text-danger">{{Session::get('doctor_id')}}</span></br>
                                    @endif

                                    @if(Session::has('turning_number'))
                                    <form class="" action="{{route('pastient.des.sess') }}" method="POST">
                                                        {{ csrf_field() }}
                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-4">
                                                    <button type="submit" class="btn btn-danger">
                                                       Make It Trash!
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
            </div>
        </div>
    </body>
</html>

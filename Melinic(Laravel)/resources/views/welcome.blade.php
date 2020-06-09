<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
            <div align="center">
             @if(Auth::guard('web')->check() || Auth::guard('admin')->check())
                @if(Session::get('turning_number'))
                    <strong>TURNING-NUMBER: </strong><span class="text-danger">{{Session::get('turning_number')}}</span>
                @endif
                @if(Session::get('total_price'))
                    <strong>TOTAL-PRICE TO PAID: </strong><span class="text-danger">{{Session::get('total_price')}}-TR</span></br>
                @endif
                @if(Session::get('kind_of_insured'))
                    <strong>INSURED: </strong><span class="text-danger">{{Session::get('kind_of_insured')}}</span>
                @endif
                @if(Session::get('room'))
                    <strong>ROOM: </strong><span class="text-danger">{{Session::get('room')}}</span>
                @endif
                @if(Session::get('doctor_specialties'))
                    <strong>SPECIALTIES: </strong><span class="text-danger">{{Session::get('doctor_specialties')}}</span></br>
                @endif
             @endif
            </div>
            @component('components.messages')
                 @endcomponent
        <div class="flex-center position-ref full-height">
                
                <div class="top-right links">
                    @if (Auth::guard('admin')->check())
                        <a href="{{ url('/admin') }}">DOCTOR-PANEL</a>
                    @endif

                    @if (Auth::guard('web')->check())
                        <a href="{{ url('/home') }}">Secretary-PANEL</a>
                    @endif
                </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel">
                            @if(Auth::guard('web')->check())
                                
                                    </p>Welcome To The Secretary Section Of The Clinic 
                                    Your Accees Is On The Highest Level </p>

                                    <a href="{{route('patient.new.add')}}">Register New Patient</a></br>
                                    <a href="{{route('doctor.info')}}">Doctors Section</a></br>
                                    <a href="{{route('doctor.info.presence')}}">Doctor Daily Presence Table</a></br>
                                    <a href="{{route('patient.new.visit')}}">Give Visit Paper To Patient</a></br>
                                    <a href="{{route('insured.settings')}}">Insured Settings</a></br>
                                    <a href="{{route('patient.history')}}">Patient Prescription History</a>
                                    


                                
                            @else
                                
                                     <p>ACCESS DENIED FOR ALL CLERKS</p>
                                     <a href="{{ url('login') }}">Login</a>
                                     <a href="{{ url('register') }}">Register</a>
                                
                            @endif

                            @if(Auth::guard('admin')->check())
                                
                                    <p>Welcome To The Docter Section Of The Clinic 
                                    Your Accees Is As Follow</p>

                                    <a href="{{route('doc.pastient.now')}}">Visit Now</a></br>
                                
                            @else
                                
                                   <p>Note: Accessing Some Parts Of This Clinic Requires Doctor Level!</p>
                                
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

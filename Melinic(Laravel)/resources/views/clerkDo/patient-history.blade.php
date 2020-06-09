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
                                <div class="panel-heading">Patient History <strong>Take The ID And Search For The Patient In 
                                    <a href="{{route('patient.search.show')}}">Patient Search Page</a></strong></div>
                                <div class="panel-body">
                                @if(Auth::guard('web')->check())
                                    
                                   @foreach($all_patient_history as $aph)
                               <p style="color: blue;">PATIENT WITH ID <strong>{{$aph->patient_id}}</strong> 
                               VISITED BY A DOCTOR WITH ID <strong>{{$aph->doctor_id}}</strong> WITH FOLLOWING PRESCRIPTION:</p>
                                             <p>{{$aph->description}}</p>
                               <br>
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

                     
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

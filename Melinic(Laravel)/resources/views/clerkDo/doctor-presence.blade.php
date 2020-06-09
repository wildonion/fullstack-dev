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
                    <div align="center" style="padding-bottom: 100px;">
                        <a href="{{ route('main') }}">SECRETARY-PANEL</a>
                    </div>
                    @endif
        <div class="flex-center position-ref full-height">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-heading">Doctor Presence</div>
                                <div class="panel-body">
                                @if(Auth::guard('web')->check())
                                    
                                    
                                @foreach($doctor_presence as $dp)
                                 <label class="form-inline">
                                        <img src="/uploads/images/{{ $dp->doc_pic }}" 
                                        alt="doc_picture" class="img-circle" width="40" height="40">
                                    </label><br>
                                   <strong>ID</strong>: <span style="color: red;">{{$dp->id}}</span></br>
                                   <strong>NAME</strong>: <span style="color: red;">{{$dp->name}}</span></br>
                                   HAS SOME <strong>EXPERIENCES IN</strong>: <span style="color: red;">{{$dp->specialties}}</span></br>
                                   AND IS <strong>PRESENCE ON</strong>: <span style="color: red;">{{$dp->days}}</span></br>
                                   <span><strong>FROM</strong></span>: <span style="color: red;">{{$dp->from}}</span> <span><strong>TILL</strong></span>: <span style="color: red;">{{$dp->till}}</span></br>
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

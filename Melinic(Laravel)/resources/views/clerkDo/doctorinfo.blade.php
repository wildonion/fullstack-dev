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
        <div class="flex-center position-ref full-height" style="padding-top: 500px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Doctor Settings</div>
                                <div class="panel-body">
                                @if(Auth::guard('web')->check())
                                    
                        @foreach($doctors_to_remove as $doctorem)
                            <form class="" action="{{route('doctor.info.del', $doctorem->id)}}" method="POST">
                                                {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this doctor');" name="name" value="delete">
                                <label class="form-inline">
                                        <img src="/uploads/images/{{ $doctorem->doc_picture }}" 
                                        alt="doc_picture" class="img-circle" width="40" height="40">
                                    </label><br>
                                 [+] ID: <strong>{{$doctorem->id}}</strong><br>
                                 [+] NAME: <strong>{{$doctorem->name}}</strong><br>
                                 [+] SPECIALTIES: <strong>{{$doctorem->specialties}}</strong><br>
                                 [+] PRICE OF FREE VISIT: <strong>{{$doctorem->price_of_free_visit}}</strong><br>
                                 [+] TOTAL EARN TILL NOW: <strong>{{$doctorem->total_earn_till_now}}</strong><br>
                                 [+] INSURED EXPIRATION DATE: <strong>{{$doctorem->insured_expiration_date}}</strong>
                             </form>
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

                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Doctor <span style="color: green;">PRESENCE</span></div>
                                <div class="panel-body">
                                @if(Auth::guard('web')->check())
                                    
                                 @foreach($p_doctos as $pdoc)
                                        <strong>[+] ID: </strong>{{$pdoc->id}}<br>
                                        <strong>[+] NAME: </strong>{{$pdoc->name}}<br>
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

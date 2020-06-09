<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
        <div class="flex-center position-ref full-height">
                <div class="top-right links">
                    @if (Auth::guard('admin')->check())
                        <a href="{{ url('/admin') }}">ADMIN-PANEL</a>
                    @endif

                    @if (Auth::guard('web')->check())
                        <a href="{{ url('/home') }}">USER-PANEL</a>
                    @endif
                </div>
                @if (!Auth::check())
                    <div class="top-left links">
                        <p>USER FORMS</p>
                         <a href="{{ url('login') }}">Login</a>
                         <a href="{{ url('register') }}">Register</a>
                    </div>
                @endif
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel">
                            @if(Auth::guard('web')->check())
                                <p>
                                    You are Logged In as a <strong>USER</strong>
                                </p>
                            @else
                                <p>
                                    You are Logged Out as a <strong>USER</strong>
                                </p>
                            @endif

                            @if(Auth::guard('admin')->check())
                                <p>
                                    You are Logged In as an <strong>ADMIN</strong>
                                </p>
                            @else
                                <p>
                                    You are Logged Out as an <strong>ADMIN</strong>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

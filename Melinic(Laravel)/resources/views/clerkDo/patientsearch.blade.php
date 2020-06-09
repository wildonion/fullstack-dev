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
            input[type=text] {
			    width: 130px;
			    box-sizing: border-box;
			    border: 2px solid #ccc;
			    border-radius: 4px;
			    font-size: 16px;
			    background-color: white;
/*			    background-image: url('searchicon.png');*/
			    background-position: 10px 10px; 
			    background-repeat: no-repeat;
			    padding: 12px 20px 12px 40px;
			    -webkit-transition: width 0.4s ease-in-out;
			    transition: width 0.4s ease-in-out;
			}

			input[type=text]:focus {
			    width: 100%;
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
                                <div class="panel-heading">Search For Patient</div>
                                <div class="panel-body">
                            @if(Auth::guard('web')->check())
                                
								<form class="form-horizontal" method="POST" action="{{ route('patient.search.result') }}">
									{{ csrf_field() }}
								  <input type="text" name="search" placeholder="Search ID, Name OR Token">
								</form>


								<hr>

								@foreach($patient_infos as $p_info)
                                	<span class="text-danger">ID:</span> <strong>{{$p_info->id}}</strong><br>
                                	<span class="text-danger">NAME:</span> <strong>{{$p_info->name}}</strong><br>
                                	<span class="text-danger">ADDREES:</span> <strong>{{$p_info->address}}</strong><br>
                                	<span class="text-danger">ISSUED:</span> <strong>{{$p_info->issued}}</strong><br>
                                	<span class="text-danger">PHONE NUMBER:</span> <strong>{{$p_info->phone_number}}</strong><br>
                                	<span class="text-danger">Disease Exprience:</span> <strong>{{$p_info->disease_experience}}</strong><br>
                                	<span class="text-danger">AGE:</span> <strong>{{$p_info->age}}</strong><br>
                                	<span class="text-danger">INSURED EXPIRATION DATE:</span> <strong>{{$p_info->insured_expiration_date}}</strong><br>
                                	<span class="text-danger">KIND OF INSURED:</span> <strong>{{$p_info->kind_of_insured}}</strong><br>
                                	<span class="text-danger">TOKEN:</span> <strong>{{$p_info->doc_token}}</strong><br>
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

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if(Auth::guard('web')->check())
                        <p class="text-success">
                            {{Auth::user()->name}} Is Logged In as a <strong>Clerk</strong>
                        </p>
                        <strong>Use This Panel For Your Personal Settings Only!</strong>
                        Click On <a href="{{ url('/') }}">Me</a> To Go ! 
                    @endif

                    @if(Auth::guard('admin')->check())
                        <p class="text-success">
                            You Have <strong>DOCTER</strong> Access For This Clinic
                        </p>
                    @else
                        <p class="text-danger">
                            You Don't Have <strong>DOCTER</strong> Permision!
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

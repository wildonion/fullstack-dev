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
                            You are Logged In as a <strong>USER</strong>
                        </p>
                    @else
                        <p class="text-danger">
                            You are Logged Out as a <strong>USER</strong>
                        </p>
                    @endif

                    @if(Auth::guard('admin')->check())
                        <p class="text-success">
                            You are Logged In as an <strong>ADMIN</strong>
                        </p>
                    @else
                        <p class="text-danger">
                            You are Logged Out as an <strong>ADMIN</strong>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

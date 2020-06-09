@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Change EveryThing On Your Own Way</div>
                <div class="panel-body">

                    <div>
                    <a href="{{ url('welcome-page-settings/header') }}">Header Settings</a>
                    </div>

                    <div>
                    <a href="{{ url('welcome-page-settings/footer', Auth::user()->id) }}">Footer Settings</a>
                    </div>

                    <div>
                    <a href="{{ url('welcome-page-settings/tags', Auth::user()->id) }}">Meta Tags Settings</a>
                    </div>
                    
                    <div>
                    <a href="{{ url('welcome-page-settings/body-setting', Auth::user()->id) }}">Active/Deactive Welcome Page</a>
                    </div>

                    <div>
                    <a href="{{ url('welcome-page-settings/brand', Auth::user()->id) }}">Brand Section</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

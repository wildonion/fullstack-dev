@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Available stuffs</div>
                <div class="panel-body">



                    @if($shop->status == 0)
                    <strong>This section is currently disabled go to your shop store settings section and enable it to access all your stuffs</strong>
                    @else
                    <strong>All stuffs here, upload apk, paypal and more...</strong>
                    @endif






                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Below Is A List Of All Changeable Header Options</div>
                <div class="panel-body">
           		
              <div><a href="{{ route('contact-info.edit', Auth::user()->id) }}">
              Contact Informations Managment
              </a></div>

              <div><a href="{{route('shop-store.index')}}">
              Shop Store
              </a></div>

              <div><a href="{{url('welcome-page-settings/header/blog/create')}}">
              Add Blog
              </a></div>
           			

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

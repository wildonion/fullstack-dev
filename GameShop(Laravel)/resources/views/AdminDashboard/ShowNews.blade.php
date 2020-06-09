@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Available News</div>
                  <div class="panel-body">

                    <form class="form-horizontal" action="{{url('welcome-page-settings/deleteall')}}" method="post">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-warning" onclick="return confirm('Are you sure to delete all data');" name="name" value="Delete All Data">
                    </form>
                   <div style="text-align: center;">
                    <div class="pagination pagination-sm">
                    
                        @foreach ($news as $new)
                        
                        <div class="page-header">
                            <div><strong>Title(IR):</strong> {{ str_replace('-', ' ', $new->title) }}</div>
                            <div><strong>Description(IR):</strong></div>
                            <div class="well well-lg">{!! $new->description !!}</div>
                            <div><strong>Title(F_User):</strong> {{ str_replace('-', ' ', $new->titleF_User) }}</div>
                            <div><strong>Description(F_User):</strong></div>
                            <div class="well well-lg">{!! $new->descriptionF_User !!}</div>
                            <form class="" action="{{route('welcome-page-settings.destroy',$new->id)}}" method="post">
                                  <input type="hidden" name="_method" value="delete">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <a href="{{ url('welcome-page-settings/blog/'.$new->id.'/edit') }}" class="btn btn-primary">Edit</a>
                                  <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data');" name="name" value="delete">
                            </form>
                        </div>
                        @endforeach
                        
                        {{ $news->links() }}

                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

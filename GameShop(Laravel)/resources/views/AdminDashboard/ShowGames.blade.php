@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Available Video Games</div>
                <div class="panel-body">
                    <div><a href="{{route('games.create')}}">Add Video Games</a></div>

                  
                      <form class="form-horizontal" action="{{url('games/deleteall')}}" method="post">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-warning" onclick="return confirm('Are you sure to delete all data');" name="name" value="Delete All Data">
                      </form>

                <div style="text-align: center;">
                    <div class="pagination pagination-sm">
                    
                        @foreach ($games as $game)
                        
                        <div class="page-header">
                            <div><strong>Title(IR):</strong> {{ str_replace('-', ' ', $game->title) }}</div>
                            <div><strong>Description(IR):</strong></div>
                            <div class="well well-lg">{!! $game->description !!}</div>
                            <div><strong>Title(F_User):</strong> {{ str_replace('-', ' ', $game->titleFUser) }}</div>
                            <div><strong>Description(F_User):</strong></div>
                            <div class="well well-lg">{!! $game->descriptionFUser !!}</div>
                            <form class="" action="{{route('games.destroy',$game->id)}}" method="post">
                                  <input type="hidden" name="_method" value="delete">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <a href="{{route('games.edit', $game->id)}}" class="btn btn-primary">Edit</a>
                                  <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data');" name="name" value="delete">
                            </form>
                         <span class="badge">{{Counter::showAndCount('game', $game->id)}}</span>  
                          <div class="label label-info">VISITORS</div>
                        </div>
                        @endforeach
                        
                        {{ $games->links() }}

                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

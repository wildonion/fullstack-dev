@foreach(['danger', 'info', 'success'] as $msg)
    @if(Session::has('alert-' . $msg))
        <div class="alert alert-{{$msg}}">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              {{Session::get('alert-' . $msg)}} 
        </div>
    @endif
@endforeach
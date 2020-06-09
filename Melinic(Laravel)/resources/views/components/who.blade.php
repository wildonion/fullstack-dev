@if(Auth::guard('web')->check())
    <p class="text-success">
        {{Auth::user()->name}} Is Logged In as a <strong>Clerk</strong>
    </p>
    <strong>Use This Panel For Your Personal Settings Only!</strong>
    Click On <a href="{{ url('/') }}">Me</a> To Go ! 
@else
    <p class="text-danger">
        You Are Not A <strong>Clerk</strong>
    </p>
@endif

@if(Auth::guard('admin')->check())
    <p class="text-success">
        {{Auth::user()->name}} Is A <strong>DOCTER</strong> Of This Clinic
    </p>
    <strong>Use This Panel For Your Personal Settings Only!</strong>
    Click On <a href="{{ url('/') }}">Me</a> To See The Last Patients!
@else
    <p class="text-danger">
        You Don't Have <strong>DOCTER</strong> Permision!
    </p>
@endif
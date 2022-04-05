@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('Success'))
    <div class="alert alert-success" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">
        {{session('Success')}}
    </div>
@endif

@if (session('Error'))
    <div class="alert alert-danger" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">
        {{session('Error')}}
    </div>
@endif

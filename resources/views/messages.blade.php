{{-- if any error then show this --}}
@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
    <div class="container">    
        <div class="alert alert-danger">
                {{$error}}
        </div>
    </div>
    @endforeach
@endif

{{-- if session success then show this --}}
@if (session('success'))
    <div class="container">    
        <div class="alert alert-success">
                {{session('success')}}
        </div>
    </div>
@endif

{{-- if session error then show this --}}
@if (session('error'))
    <div class="container">    
        <div class="alert alert-danger">
                {{session('error')}}
        </div>
    </div>
@endif
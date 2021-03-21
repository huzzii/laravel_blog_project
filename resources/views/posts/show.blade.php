@extends('layouts.app')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> --}}
@endsection

@section('content')
<div class="container">
    <a href="/home" class="btn btn-default">Go Back</a>
    <center><h1>{{$posts->title}}</h1></center>
    <center><small>Created At {{$posts->created_at}} by {{$posts->user->name}}</small></center> 
    <img style="width:100%;" src='/storage/cover_image/{{$posts->cover_image}}'>
    <center><h3>{!!$posts->body!!}</h3></center>   
    <hr>
    @if (!Auth::guest())
        @if (Auth::user()->id == $posts->user_id)
            <a href="/posts/{{$posts->id}}/edit" class="btn btn-warning">Edit Post</a>
            {!! Form::open(['action' => ['PostsController@destroy', $posts->id], 'method' => 'POST', 'class' => 'delete pull-right'])!!} 
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('delete', ['class' => 'btn btn-danger'])}}
            {!! Form::close() !!}
            
         
        @endif  
    @endif
    


    <script>
        $(document).on('click','.delete' ,function(){
            return confirm("Do you want to delete this post?");
        });
    </script>
</div>
@endsection
       

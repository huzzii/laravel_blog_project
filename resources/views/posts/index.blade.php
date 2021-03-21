@extends('layouts.app')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
@endsection

@section('content')
<div class="container">
    <a href="/posts/create" class="btn btn-primary">Create Post</a>
    <center><h1>Create Posts</h1></center>  
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="well">
                <div class="row">
                    <div class="col-lg-4">
                    <img style="width:100%" src="/storage/cover_image/{{$post->cover_image}}">
                    </div>
                    <div class="col-lg-8">
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a><h3>
                        <small> Created at {{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                </div>

                
            </div>
        @endforeach
        {{ $posts->links() }}
    @else
        <p>No Post Found</p> 
    @endif   
</div>
@endsection
       

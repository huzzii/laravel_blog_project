@extends('layouts.app')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <a href="/posts" class="btn btn-default"> Go Back </a>
        <center><h1>Edit Posts</h1></center>  
    </div> 
    {!! Form::open(['action' => ['PostsController@update', $posts->id ], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', $posts->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Body')}}
        {{Form::textarea('body', $posts->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
</div>
@endsection
       

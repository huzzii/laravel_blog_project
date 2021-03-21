@extends('layouts.app')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
@endsection

@section('content')
<div class="jumbotron text-center">
    <h1>Welcome To My App!</h1>
    <p>This is the Business Management Application from the "<b><u><i>Huzari Software Solutions</i></u></b>"</p>
    <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
</div>
@endsection
            

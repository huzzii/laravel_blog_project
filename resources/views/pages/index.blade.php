@extends('layouts.app')
{{-- @extends('navbar') --}}
@section('head')
<link rel="stylesheet" href="{{asset('css/app.css')}}">

 {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
	
@endsection
@section('content')
    <div class="jumbotron text-center">
        <h1>Welcome To My Laravel Project!</h1>
        <p style="padding: 0 30px; text-align:justify; ">I have created a small blogging application for learning purpose and getting used to of laravel features. Here i have used authentication, authorization, built in login, register, forget password, reset passowrd of laravel using auth command, along with form validations, blade, components, layout, file upload/retrieve & many more such things. Hope you like it.</p>
        <p style="padding: 0 30px; text-align:justify;">In this project a user can see all his posts, create new posts, edit & delete only those posts which he has created & also he can see all the posts which all the other users have created.</p>
        <p style="padding: 0 30px; text-align:justify;">To view all the posts of this application, a user doesnt always need to be logged in. But to update or delete his own post, he needs be loggd in first, so that he can do whatever he wants, but only to his own posts and not the others post.  </p>
        <!-- <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p> -->
    </div>
@endsection
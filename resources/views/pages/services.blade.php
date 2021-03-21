@extends('layouts.app')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
@endsection

@section('content')
<div class="container">
    <center><h1>{{$title}}</h1></center>   
    <center><h3><b>{{$description}}</b></h3></center> 
    @if ($list > 0)
    <ul class="list-group">
        @foreach ($list as $mlist)
            <li class="list-group-item"><center><i> {{$mlist}} </i></center></li>
        @endforeach
    </ul>
</div>
    @endif   
@endsection
       

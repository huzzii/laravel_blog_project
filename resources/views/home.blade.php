@extends('layouts.app')
@section('head')
<script>
    $(document).ready(function(){
        if($("div.alert").is(":visible")){
            $("div.well").fadeOut(3000);
            // alert("The paragraph  is visible.");
        } 
        // else {
            // alert("The paragraph  is not visible.");
        // }
    });
</script>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="text-center">
                        <h1>Your Posts</h1> 
                    </div>
                    <div class="text-left">
                        <a href="/posts/create" class="btn btn-primary">Create Posts</a> 
                    </div>
                    <br>
                    @if (count($posts) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($posts as $post)
                                <tr>
                                <td><a href="/posts/{{$post->id}}">{{$post->title}}</a></td>
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-warning">Edit</a></td>
                                    {{-- <td><a href="" class="btn btn-danger">Delete</a></td> --}}
                                    <td>
                                        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'delete'])!!} 
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('delete', ['class' => 'btn btn-danger'])}}
                                        {!! Form::close() !!}
                                    </td>
    
                                </tr>     
                            @endforeach
                           
                        </table>    
                    @else
                        <p>No Post Found</p>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click','.delete' ,function(){
            return confirm("Do you want to delete this post?");
        });
    </script>
</div>

@endsection

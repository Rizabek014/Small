@extends('layouts.app')

@section('content')
    <a href='/posts' class='btn btn-default'></a>
    <h1>{{$post->title}}</h1>
    
    <div>
        {{$post->body}}
    </div>
    <small>Written on {{$post->created_at}}</small>
    <hr>
    @if(isset($post->manager_answer))
    
        <div>
            <h6>Manager Answer:</h6>
                {!!$post->manager_answer!!}
        </div>
    
    @endif
    @if(!Auth::guest() && Auth::user()->id == $post->user_id || Auth::user()->role == 1)
    <a href = "/posts/{{$post->id}}/edit" class = "btn btn-default">Edit</a>

    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
    @endif
@endsection
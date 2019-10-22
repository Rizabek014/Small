@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}
        <div class = 'form-group'>
            {{ Form::label('title', 'Title')}}
            {{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class = 'form-group'>
                {{ Form::label('body', 'Body')}}
                {{ Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        @if(Auth::user()->role == 1)
            {{Form::hidden('manager_id', Auth::user()->id)}}    
            {{ Form::label('answer', 'Manager Answer')}}
            {{ Form::text('answer', $post->manager_answer, ['class' => 'form-control', 'placeholder' => 'Answer'])}}
        @endif
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
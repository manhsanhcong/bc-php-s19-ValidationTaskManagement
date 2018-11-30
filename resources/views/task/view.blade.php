@extends('home')

@section('content')
    <a class="navbar-brand">My Book</a>
    <p>
        <a href="{{route('task.index')}}" class="btn btn-default">Return task</a>
    </p>

    <h1>{{$task->title}}</h1>
    <p>{{$task->content}}</p>
    <p>{{$task->image}}</p>
    <p>{{$task->due_date}}</p>

@endsection
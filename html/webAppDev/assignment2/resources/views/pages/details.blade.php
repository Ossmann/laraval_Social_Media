@extends('layouts.master')
@section('title')
    Details_Page
@endsection
@section('content')
<h1>Details Page of {{$partner->name}}</h1>
<h3>{{$partner->name}} offers following projects:</h3>
<ul>
    @foreach ($projects as $project)
        <a href="projects/{{$project->id}}"><li>{{$project->title}}</li></a>
    @endforeach
</ul>

<p><a href="create_project/{{$partner->id}}">Create Project</a></p>
@endsection
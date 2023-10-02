@extends('layouts.master')
@section('title')
    Details_Page
@endsection
@section('content')
<h1>Details Page of {{$partner->name}}</h1>
<ul>
    @foreach ($projects as $project)
        <a href="project/{{$project->title}}"><li>{{$project->title}}</li></a>
    @endforeach
</ul>

<p><a href='{{url("project/create")}}'>Create Project</a></p>
@endsection
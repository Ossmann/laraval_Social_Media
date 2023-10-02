@extends('layouts.master')
@section('title')
    Details_Page
@endsection
@section('content')
<h1>Details Page of {{$partner->inp_name}}</h1>
<h3>{{$partner->inp_name}} offers following projects:</h3>
<ul>
    @foreach ($projects as $project)
        <a href="project/{{$project->id}}"><li>{{$project->title}}</li></a>
    @endforeach
</ul>

<p><a href='{{url("project/create")}}'>Create Project</a></p>
@endsection
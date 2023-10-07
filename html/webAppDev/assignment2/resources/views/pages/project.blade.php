@extends('layouts.master')
@section('title')
    Project_Page
@endsection
@section('content')
<p>{{$partner->name}}</p>
<p>{{$partner->email}}</p>

<h1>Project: {{$project->title}}</h1>
<ul>
   <li>description: {{$project->description}}</li>
   <li>Required Nr. of students: {{$project->students_required}}</li>
   <!-- insert images and pdfs -->
</ul>

<p><a href='{{url("project/create")}}'>Create Project</a></p>
@endsection
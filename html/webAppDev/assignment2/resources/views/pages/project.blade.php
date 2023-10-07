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

<p><a href="delete_project/{{$project->id}}">Delete Project</a></p>
<p><a href="{{ route('home') }}">Back</a></p>
@endsection
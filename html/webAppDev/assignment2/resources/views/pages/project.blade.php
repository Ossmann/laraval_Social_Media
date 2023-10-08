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

    @foreach ($project->images as $image)
            <img src="{{ asset('storage/' . $image->image) }}" alt="image" style="width:300px;height:300px;">
    @endforeach

    @foreach ($project->pdfs as $pdf)
            <a href="{{ asset('storage/' . $pdf->file_name) }}" target="_blank">View PDF</a>
    @endforeach



<p><a href="delete_project/{{$project->id}}">Delete Project</a></p>

<p><a href="apply/{{$project->id}}">Apply</a></p>

<p><a href="{{ route('home') }}">Back</a></p>
@endsection
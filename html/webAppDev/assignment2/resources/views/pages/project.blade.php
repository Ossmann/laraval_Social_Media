@extends('layouts.master')
@section('title')
    Project Page
@endsection
@section('content')
<p>{{$partner->name}}</p>
<p>{{$partner->email}}</p>

<h1>Project: {{$project->title}}</h1>
<ul>
   <li>description: {{$project->description}}</li>
   <li>Required Nr. of students: {{$project->students_required}}</li>
</ul>

    <h3>Applicants:</h3>
<ul>
    <!-- Show all students that applied and their justification -->
    @foreach ($project->applications as $application)
        <li>
            
        <a href="{{ route('profile', ['id' => $application->user->id]) }}">{{ $application->user->name }}</a>
            <ul>
                <li>
                    Motivation: {{$application->justification}}
                </li>
            </ul>
        </li>
    @endforeach
</ul>


<!-- Show all images and pdfs of that project -->
    @foreach ($project->images as $image)
            <img src="{{ asset('storage/' . $image->image) }}" alt="image" style="width:300px;height:300px;">
    @endforeach

    @foreach ($project->pdfs as $pdf)
            <a href="{{ asset('storage/' . $pdf->file_name) }}" target="_blank">View PDF</a>
    @endforeach


    
<p><a href="delete_project/{{$project->id}}">Delete Project</a></p>

<p>{{auth()->user()->id}}</p>

<p><a href="apply/{{$project->id}}/{{auth()->user()->id}}">Apply</a></p>

<p><a href="{{ route('home') }}">Back</a></p>
@endsection
@extends('layouts.master')
@section('title')
    List of all projects
@endsection
@section('content')
<h1>List of Projects</h1>

<!-- loop through years and trimesters to cluster projects -->
<ul>
    @foreach ($projects as $year => $trimesterGroup)
        <li><strong>{{ $year }}</strong></li>
        <ul>
            @foreach ($trimesterGroup as $trimester => $projectsInTrimester)
                <li><strong>Trimester {{ $trimester }}</strong></li>
                <ul>
                    @foreach ($projectsInTrimester as $project)
                        <li><a href="partner/projects/{{ $project->id }}">{{ $project->title }}</a></li>
                    @endforeach
                </ul>
            @endforeach
        </ul>
    @endforeach
</ul>





<p><a href="{{ route('home') }}">Back</a></p>
@endsection
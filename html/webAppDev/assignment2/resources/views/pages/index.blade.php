@extends('layouts.master')
@section('title')
    PartnersTableSeeder
@endsection
@section('content')
<h1>HomePage - List of Industry Partners</h1>
<ul>
    @foreach ($partners as $partner)
        <a href="partner/{{$partner->id}}"><li>{{$partner->name}}</li></a>

    @endforeach
</ul>

<p><a href="projectslist">All Projects</a></p>
<p><a href="studentlist">All Students</a></p>


{{ $partners->links()}}

@endsection
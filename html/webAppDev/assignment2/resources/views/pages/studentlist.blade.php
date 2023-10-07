@extends('layouts.master')
@section('title')
    PartnersTableSeeder
@endsection
@section('content')
<h1>HomePage - List of Industry Partners</h1>
<ul>
    @foreach ($students as $student)
        <a href="profile/{{$student->id}}"><li>{{$student->name}}</li></a>

    @endforeach
</ul>

<p><a href="{{ route('home') }}">Back</a></p>
@endsection
@extends('layouts.master')
@section('title')
    Student Profile Page
@endsection
@section('content')

<h1>Student Profile</h1>
<h3>{{$student->name}}</h3>
<ul>
   <li>GPA: {{$student->gpa}}</li>
   @foreach ($student->roles as $role)
    <li>Roles: {{$role->role}}</li>
   @endforeach
</ul>

<p><a href="update/{{$student->id}}">Update Profile</a></p>
<p><a href="{{ route('home') }}">Back</a></p>
@endsection
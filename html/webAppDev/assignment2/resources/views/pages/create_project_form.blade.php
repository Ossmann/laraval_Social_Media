@extends('layouts.master')
@section('title')
    Create a new project
@endsection
@section('content')

<h1>Create a Project</h1>

<form method="POST" action=" {{url("create_project_action")}}">
    @csrf
    @method('PUT')

    <h3>
        {{$partner->name}}
    </h3>

    <!-- send the id of the partner hidden -->
    <input type="hidden" name="user_id" value="{{$partner->id}}">

        <ul>
            <li>
                <label for="title">Project title:</label>
                <input type="text" name="title" id="title">
            </li>
            <li>
                <label for="description">Description:</label>
                <input type="text" name="description" id="description">
            </li>
            <li>
                <label for="students_required">Number of students required:</label>
                <input type="number" name="students_required" id="students_required" step="1">
            </li>
            <li>
                <label for="year">Year:</label>
                <input type="number" name="year" id="year" step="1">
            </li>
            <li>
                <label for="trimester">Trimester:</label>
                <input type="text" name="trimester" id="trimester">
            </li>
        </ul>

    <button type="submit">Create</button>
</form>


<p><a href="{{ route('home') }}">Back</a></p>
@endsection
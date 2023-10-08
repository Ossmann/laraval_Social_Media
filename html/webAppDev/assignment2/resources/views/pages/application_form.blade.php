@extends('layouts.master')
@section('title')
    Student Application to Project
@endsection
@section('content')

<h1>{{auth()->user()->name}} application to</h1>
<h1>{{$application->project->title}}</h1>

<form method="POST" action="{{ url("application_action/{$application->id}") }}">
    @csrf

    <ul>
        <li>
            Justification:
            <input type="text" name="justification">
        </li>
        <li>
            Roles:
            <select name="roles[]" id="roles" multiple>
                <option value="software developer">software developer</option>
                <option value="project manager">project manager</option>
                <option value="business analyst">business analyst</option>
                <option value="tester">tester</option>
                <option value="lient liason">client liason</option>
            </select>
        </li>
    </ul>

    <button type="submit">Update</button>
</form>


<p><a href="{{ route('home') }}">Back</a></p>
@endsection
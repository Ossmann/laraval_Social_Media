@extends('layouts.master')
@section('title')
    Student Profile Page
@endsection
@section('content')

<h1>Update Student Profile</h1>

<form method="POST" action=" {{url("update_profile_action/$student->id")}}">
    @csrf
    @method('PUT')

    <h3>
        <input type="text" name="name" id="name" value="{{$student->name}}">
    </h3>
    <ul>
        <li>
            GPA:
            <input type="text" name="gpa" id="gpa" value="{{$student->gpa}}">
        </li>
        <li>
            Email:
            <input type="text" name="email" id="email" value="{{$student->email}}">
        </li>
        <li>
            Roles:
            <select name="role" id="role" multiple>
                <option value="volvo">software developer</option>
                <option value="saab">project manager</option>
                <option value="opel">business analyst</option>
                <option value="audi">tester</option>
                <option value="audi">client liason</option>
            </select>
        </li>
    </ul>

    <button type="submit">Update</button>
</form>


<p><a href="{{ route('home') }}">Back</a></p>
@endsection
@extends('layouts.master')
@section('title')
    PartnersTableSeeder
@endsection
@section('content')
<h1>HomePage - List of Industry Partners</h1>
<ul>
    @foreach ($partners as $partner)
        <a href="partner/{{$partner->name}}"><li>{{$partner->name}}</li></a>
    @endforeach
</ul>

<p><a href='{{url("/project_list")}}'>Projects List</a></p>
@endsection
@extends('layouts.master')
@section('title')
    PartnersTableSeeder
@endsection
@section('content')
<h1>HomePage - List of Industry Partners</h1>
<ul>
    @foreach ($partners as $partner)
        <a href="partner/{{$partner->id}}"><li>{{$partner->name}}</li></a>
        @if($partner->status != 'approved' && auth()->user()->type == 'teacher')
            <p><a href="approve/{{$partner->id}}">Approve Partner</a></p>
        @endif
    @endforeach
</ul>

<p><a href="projectslist">All Projects</a></p>
<p><a href="studentlist">All Students</a></p>


{{ $partners->links()}}

@endsection
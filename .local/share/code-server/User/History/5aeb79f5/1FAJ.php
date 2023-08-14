@extends('layouts.master')

@section('title')
  Result
@endsection

@section('content')
    <p>
    Hello {{$user}}.
    Next year, you will be {{$age}} years old.

    <hr>
@endsection
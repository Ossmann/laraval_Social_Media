@extends('layouts.master')

@section('title')
  Greeting Form
@endsection

@section('content')
    <p>
    Hello {{$user}}.
    Next year, you will be {{$age}} years old.

    <hr>
@endsection
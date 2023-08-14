@extends('layouts.master')

@section('title')
  Item list
@endsection

@section('content')

    <p><h1>{{$item->summary}}</h1></p>
    <p>{{$item->detail}}</p>
    
@endsection
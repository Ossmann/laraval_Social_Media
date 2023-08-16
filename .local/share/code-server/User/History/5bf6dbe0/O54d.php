@extends('layouts.master')

@section('title')
  Item list
@endsection

@section('content')

  <div id="post">
    <p><h2>{{$post->post_title}}</h2></p>
      <div id="author">{{$post->user_name}}</div>
      <div id="message">{{$post->message}}</div>
  </div>

    <!-- Look into the lecture notes how to delet -->

    <a href="{{url("/")}}">Home</a>

@endsection
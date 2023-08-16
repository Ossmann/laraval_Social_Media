@extends('layouts.master')

@section('title')
  Item list
@endsection

@section('content')

  <div id="post">
    <p><h2>{{$post->title}}</h2></p>
      <div id="author">{{$post->user_name}}</div>
      <div id="message">{{$post->message}}</div>
  </div>

    <!-- Look into the lecture notes how to delet -->
    <a href="{{url("delete_item/$item->id")}}">Delete this item</a> <br><br>
    <a href="{{url("update_item/$item->id")}}">Update this item</a> <br><br>
    
    <a href="{{url("/")}}">Home</a>

@endsection
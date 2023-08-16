@extends('layouts.master')

@section('title')
  Item list
@endsection

@section('content')

    <p><h1>{{$post->summary}}</h1></p>
    <div id="title"><a href="{{url("post_detail/$post->post_id")}}">{{$post->post_title}}</a></div>
            <div id="author">{{$post->user_name}}</div>
            <div id="message">{{$post->message}}</div>

    <!-- Look into the lecture notes how to delet -->
    <a href="{{url("delete_item/$item->id")}}">Delete this item</a> <br><br>
    <a href="{{url("update_item/$item->id")}}">Update this item</a> <br><br>
    
    <a href="{{url("/")}}">Home</a>

@endsection
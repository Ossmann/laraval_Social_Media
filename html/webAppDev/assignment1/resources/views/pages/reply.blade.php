<!-- Home Page -->

@extends('layouts.master')

@section('title')
  Users - List of Users
@endsection

@section('nav_links')
  <li class="nav-item">
    <a class="nav-link" href="{{url("/")}}">Posts</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url("users")}}">Users</a>
  </li>
@endsection

@section('content')

<div class="comment-content">
  <div class="topline">
    <div class="author">{{$comment->user_name}}</div>
    <div class="date">{{$comment->date}}</div>
  </div>
  <div class="message">{{$comment->comment_message}}</div>
</div>



  @endsection
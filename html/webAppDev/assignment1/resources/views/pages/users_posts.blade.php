<!-- Home Page -->

@extends('layouts.master')

@section('title')
  Posts - All Posts of {{$user_name}}
@endsection

@section('nav_links')
  <li class="nav-item">
    <a class="nav-link" href="{{url("/")}}">Posts</a>
  </li>
  <li class="nav-item active">
    <a class="nav-link" href="{{url("users")}}">Users</a>
  </li>
@endsection

@section('content')

<div class="container">

  @if ($posts)
        <ul>
          @foreach($posts as $post)
          <div class="post">
            <div class="topline">
              <div class="title"><a href="{{url("post_detail/$post->post_id")}}">{{$post->post_title}}</a>

                <!-- Comment Counter -->
                <div class="comment_counter">
                  <i class="bi bi-chat-left-text"></i>
                  {{ $post->comment_counter}}
                </div>
              </div>
              <div class="date">{{$post->date}}</div>
            </div>
            
            <div class="author">{{$post->user_name}}</div>

              <!-- //Delete Post Button -->
              <div class="delete">
              <a href="{{url("delete_post/$post->post_id")}}">
                <i class="bi bi-dash-circle-fill"></i>
                Delete</a>
              </div>
          </div>
          @endforeach
        </ul>
        @else
          No post found
  @endif

        <a href="{{url("users")}}"><i class="bi bi-arrow-left-square-fill"></i> Back</a>
      </div>

</div>
  @endsection
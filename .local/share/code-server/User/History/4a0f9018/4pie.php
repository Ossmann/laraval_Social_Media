<!-- Home Page -->

@extends('layouts.master')

@section('title')
  Users - List of Users
@endsection

@section('content')

<h1>Users - List of Users</h1>

    <!-- left column -->
    <div class="col-sm-6">

      @if ($posts)
        <ul>
          @foreach($posts as $post)
          <div id="post">
            <div id="title">{{$post->post_title}}</div>
            <div id="author">{{$post->user_name}}</div>
            <div id="message">{{$post->message}}</div>

              <!-- //Delete Post Button -->
              <div id="delete"><a href="{{url("delete_post/$post->post_id")}}">Delete</a></div>
          </div>
          @endforeach
        </ul>
        @else
          No post found
      @endif

    </div>

        </div>
  @endsection
<!-- Home Page -->

@extends('layouts.master')

@section('title')
  Hompage - List of Posts
@endsection

@section('content')

<h1>Home Page - List of Posts</h1>

<div class="container">
  <div class = "row" id="content">

    <!-- left column -->
    <div class="col-sm-6">

      @if ($posts)
        <ul>
          @foreach($posts as $post)
          <div class="post">
            <div class="title"><a href="{{url("post_detail/$post->post_id")}}">{{$post->post_title}}</a></div>
            <div class="author">{{$post->user_name}}</div>
            <div class="message">{{$post->message}}</div>

              <!-- //Delete Post Button -->
              <div id="delete">
              <a href="{{url("delete_post/$post->post_id")}}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle-fill" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
              </svg>
                Delete</a>
              </div>
          </div>
          @endforeach
        </ul>
        @else
          No post found
      @endif

    </div>

    
        <!-- right column -->
        <div class="col-sm-6">

        <!-- form to create post -->
          <form method="post" action="{{url("create_post_action")}}">
            {{csrf_field()}}
              <p>
                <label>Post Title</label>
                <input type="text" name="post_title">
              </p>
              <p>
                <label>Author</label>
                <input type="text" name="author">
              </p>
              <p>
                <label>Message</label>
                <textarea type="text" name="message"></textarea>
              </p>
            <input type="submit" value="Post">
          <!-- </form> -->
        </div>
  </div>
</div><!-- /.container -->
  @endsection
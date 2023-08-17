<!-- Home Page -->

@extends('layouts.master')

@section('title')
  Hompage - List of Posts
@endsection

@section('nav_links')
  <li class="nav-item active">
    <a class="nav-link" href="{{url("/")}}">Posts</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url("users")}}">Users</a>
  </li>
@endsection


@section('content')

<div class="container">

<h1>Home Page - List of Posts</h1>

  <div class = "row" id="content">

    <!-- left column -->
    <div class="col-sm-6">

      @if ($posts)
        <ul>
          @foreach($posts as $post)
          <div class="post">
            <div class="title"><a href="{{url("post_detail/$post->post_id")}}">{{$post->post_title}}</a>

            <!-- Comment Counter -->
            <div class="comment_counter">
              <i class="bi bi-chat-left-text"></i>
              
               {{ $post->comment_counter}}
               
              
            </div>


            </div>
            
            <div class="author">{{$post->user_name}}</div>
            <div class="message">{{$post->message}}</div>

            @if ($like_toggle = true)
              <form method="post" action="{{url("create_post_action")}}">
                {{csrf_field()}}
                  <p>
                    <label>Author</label>
                    <input type="text" name="author">
                  </p>
                <input type="submit" value="Like">
              </form>
            @else
              <!-- //Like Button -->
              <div class="like_button">
              <a class="nav-link" href="{{url("/like_input")}}"><i class="bi bi-hand-thumbs-up-fill"></i></a>
              </div>
            @endif

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
          </form>
        </div>
  </div>
</div><!-- /.container -->
  @endsection
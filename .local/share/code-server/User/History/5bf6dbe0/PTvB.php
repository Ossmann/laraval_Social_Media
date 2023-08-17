@extends('layouts.master')

@section('title')
  Item list
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

<h1>Post Details</h1>

<div class="container">
  <div class = "row" id="content">

    <!-- left column -->
    <div class="col-sm-6">

      <div class="post">
            <p><h3>{{$post->post_title}}</h3></p>
              <div class="author">{{$post->user_name}}</div>
            <div class="message">{{$post->message}}</div>
      </div>


      <!-- Loop to display coments for a Post -->
      @foreach($comments as $comment)

      <div class="comment">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-chat-square-text-fill" viewBox="0 0 16 16">
          <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
        </svg>

          <div class="comment-content">
            <div class="author">{{$comment->user_name}}</div>
            <div class="message">{{$comment->comment_message}}</div>
          </div>
      </div>
      @endforeach


    </div>
    
        <!-- right column -->
        <div class="col-sm-6">

        <!-- form to create a comment -->
          <form method="post" action="{{url("create_comment_action")}}">
            {{csrf_field()}}
              <!-- send post_id with the form to be able to insert into DB with comment -->
              <input type="hidden" name="post_id" value="{{ $post->post_id}}">
              <p>
                <label>Author</label>
                <input type="text" name="author">
              </p>
              <p>
                <label>Message</label>
                <textarea type="text" name="comment_message"></textarea>
              </p>
              <p>Date</p>
            <input type="submit" value="Comment">
          <!-- </form> -->
        </div>
  </div>

  <a href="{{url("/")}}">Back</a>
</div><!-- /.container -->



@endsection
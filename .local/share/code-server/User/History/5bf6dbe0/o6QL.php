@extends('layouts.master')

@section('title')
  Item list
@endsection

@section('content')

    <a href="{{url("/")}}">Home</a>



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
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-right" viewBox="0 0 16 16">
            <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2z"/>
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
</div><!-- /.container -->

@endsection
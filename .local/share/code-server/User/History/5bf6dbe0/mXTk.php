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

      <div id="post">
      <p><h2>{{$post->post_title}}</h2></p>
        <div id="author">{{$post->user_name}}</div>
        <div id="message">{{$post->message}}</div>
      </div>

      <div id="post">
      <p><h2>{{$post->post_title}}</h2></p>
        <div id="author">{{$post->user_name}}</div>
        <div id="message">{{$post->message}}</div>
      </div>

      
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
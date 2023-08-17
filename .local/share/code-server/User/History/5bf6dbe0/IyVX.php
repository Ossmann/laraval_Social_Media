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

      @if ($posts)
        <ul>
          @foreach($posts as $post)
          <div id="post">
            <div id="title"><a href="{{url("post_detail/$post->post_id")}}">{{$post->post_title}}</a></div>
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
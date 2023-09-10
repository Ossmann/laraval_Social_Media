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
<!-- @dump($posts) -->
<h1>Home Page - List of Posts</h1>
<div class="validation_error">
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
</div>

  <div class = "row" id="content">

    <!-- left column -->
    <div class="col-sm-6">

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

    </div>

    
        <!-- right column -->
        <div class="col-sm-6">

        <!-- form to create post -->
          <form name="create_post_form" method="post" action="{{url("create_post_action")}}" onsubmit="return validateForm()">
            {{csrf_field()}}
              <p>
                <label>Post Title</label>
                <input type="text" name="post_title">
              </p>
              <p>
                <label>Author</label>
                @if (session('user_name'))
                  {{session('user_name')}}
                @else
                  <input type="text" name="author">
                @endif
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



<!-- script for Task2 Validation
  <script>
    function validateForm() {
        let title = document.forms["create_post_form"]["post_title"].value;
        let author = document.forms["create_post_form"]["author"].value;
        let message = document.forms["create_post_form"]["message"].value;
        const wordsInMessage = message.split(' ').filter(word => word.length > 0);

        if (title == "") {
          alert("Title must be filled out");
          return false;
        } else if (title.length < 3) {
          alert("Title must have at least 3 characters");
          return false;
        } else if (author == "") {
          alert("Author must be filled out");
          return false;
        } else if (author.match(/\d/)) {
          alert("Author must not contain numeric characters.");
          return false;
        } else if (message == "") {
          alert("Message must be filled out");
          return false;
        } else if (wordsInMessage.length < 5) {
          alert("Message must have it least 5 words.");
          return false;
        }
      }

  </script> -->

  @endsection
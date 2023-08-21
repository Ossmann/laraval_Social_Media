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

@dump($post)
@dump($comments)

<div class="container">
<h1>Details</h1>

  <div class = "row" id="content">

    <!-- left column -->
    <div class="col-sm-6">

      <div class="post">
            <p><h3>{{$post->post_title}}</h3></p>
            <a href="">Edit Post</a>
              <div class="author">{{$post->user_name}}</div>
              <div class="date">{{$post->date}}</div>
            <div class="message">{{$post->message}}</div>


              <!-- //Like Button ?? CHECK IF here we can Like aswell --> 
              <div class="like">
                <div class="like_button">
                <i class="bi bi-hand-thumbs-up-fill"></i>
                </div>
                <!-- Like counter -->
              </div>
      </div>
      @foreach($comments as $comment)
        <div class="comment">
          <div class="commentline">
            <i class="bi bi-chat-right-text-fill"></i>
            <div class="comment-content">
              <div class="topline">
                <div class="author">{{$comment->user_name}}</div>
                <div class="date">{{$comment->date}}</div>
              </div>
              <div class="message">{{$comment->comment_message}}</div>
            </div>
          </div>

          <!-- Reply Button with bootstrap Modal -->
          <div class="reply">

            <!-- Button trigger modal -- add the comment variable to the data target -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $comment->comment_id }}">
            <i class="bi bi-reply-all-fill"></i>Reply</a>
            </button>

            

            z
          </div>
          

        </div>

        @foreach($comment->replies as $reply)
        <div class="reply">
          <div class="replyline">
            <div class="reply-content">
              <div class="topline">
                <div class="author">{{$reply->user_name}}</div>
                <div class="date">{{$reply->date}}</div>
              </div>
              <div class="message">{{$reply->reply_message}}</div>
            </div>
            <div class="reply_icon">
              <i class="bi bi-chat-left-text"></i>
            </div>
          </div>
        </div>
        @endforeach

        @endforeach


    </div>
    
        <!-- right column -->
        <div class="col-sm-6">

        <!-- form to create a comment -->
          <form method="post" action="{{url("create_comment_action")}}">
            {{csrf_field()}}
            <p>Comment on Post</p>
              <!-- send post_id with the form to be able to insert into DB with comment -->
              <input type="hidden" name="post_id" value="{{$post->post_id}}">
              <p>
                <label>Author</label>
                <input type="text" name="author">
              </p>
              <p>
                <label>Message</label>
                <textarea type="text" name="comment_message"></textarea>
              </p>
            <input type="submit" value="Comment">
          </form>
        </div>
  </div>

  <a href="{{url("/")}}">Back</a>
</div><!-- /.container -->



@endsection
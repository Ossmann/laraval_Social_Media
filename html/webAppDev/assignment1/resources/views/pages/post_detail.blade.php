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

<!-- Set a variable to create a various levels of comments -->
@php
    $previousCommentId = "start";
@endphp

{{ session('liked_blocked') === false ? 'false' : 'true'}}

<!-- @dump($post)
@dump($comments) -->

<div class="container">
<h1>Details</h1>

  <div class = "row" id="content">

    <!-- left column -->
    <div class="col-sm-6">

      <div class="post">
            <p><h3>{{$post->post_title}}</h3></p>
            <!-- Edit Post Button trigger modal  -->
            <div id="editPostButton">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editPostModal">Edit
            </button>
            </div>
              <div class="author">{{$post->user_name}}</div>
              <div class="date">{{$post->date}}</div>
            <div class="message">{{$post->message}}</div>

            

            <!-- Modal to edit a Post -->
            <div class="modal fade" id="editPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">"{{$post->post_title}}"</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="{{ url('edit_post_action/' . $post->post_id) }}">
                        {{csrf_field()}}
                        <p>
                          <label>Username</label>
                          <div class="blue_text">{{$post->user_name}}</div>{
                        </p>
                        <p>
                          <label>Edit Post Title</label>
                          <textarea type="text" name="post_title">{{$post->post_title}}</textarea>
                        </p>
                        <p>
                          <label>Edit Post Message</label>
                          <textarea type="text" name="message">{{$post->message}}</textarea>
                        </p>
                  </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="submit" value="Save Changes">
                    </div>
                  </form>
                </div>
              </div>
          </div>


            <!-- Condition either show Author form to input name of Liker or Like Button -->
            @if ($like_toggle)
              <div class="form_post">
              <form method="post" action="{{url("create_like_action/{$post->post_id}")}}">
                {{csrf_field()}}
                <p>
                  @if (session('user_name'))
                    {{session('user_name')}}
                    <input type="hidden" name="author" value="{{session('user_name')}}">
                  @else
                    <input type="text" name="author" placeholder="Enter user name">
                  @endif
                </p>
                <input type="submit" value="Submit Like">
              </form>
              </div>
            @else
              <!-- //Like Button -->
                <div class="like">
                <!-- Normal or Disabled Button if User allready Liked -->
                @if(session('liked_blocked'))
                  <div class="like_button_disabled">
                    <i class="bi bi-hand-thumbs-up-fill"></i>
                  </div>
                @else
                  <div class="like_button">
                    <a class="nav-link" href="{{url("like_input/{$post->post_id}")}}"><i class="bi bi-hand-thumbs-up-fill"></i></a>
                  </div>
                @endif

                  {{$post->like_count}}
                </div>
            @endif

      </div>

      <!-- Display Comments -->
      @foreach($comments as $comment)
        @if ($previousCommentId === "start")
          <div class="comment">
            <div class="commentline">
              
              <!-- Reply to comment modal -- add the comment variable to the data target -->
              <button type="button" class="btn btn-link" data-toggle="modal" data-target="#replyCommentModal{{ $comment->comment_id }}">Reply</button>


              <i class="bi bi-chat-right-text-fill"></i>
              <div class="comment-content">
                <div class="topline">
                  <div class="author">{{$comment->user_name}}</div>
                  <div class="date">{{$comment->date}}</div>
                </div>
                <div class="message">{{$comment->comment_message}}</div>
              </div>
            </div>

            <!-- reassign variable to check comment for parent -->
            @php
              $previousCommentId = $comment->comment_parent_id;
            @endphp
          </div>

        @else
          <!-- Check if a comment is subcomment of another -->
          @if ($comment->comment_parent_id === $previousCommentId)
            <div class="reply_answer">
              <div class="commentline">
                <div class="reply-content">
                  <div class="topline">
                    <div class="author">{{$comment->user_name}}</div>
                    <div class="date">{{$comment->date}}</div>
                  </div>
                  <div class="message">{{$comment->comment_message}}</div>
                </div>
                <div class="reply_icon">
                  <i class="bi bi-chat-left-text"></i>
                </div>
                <!-- Reply to comment modal -- add the comment variable to the data target -->
              <button type="button" class="btn btn-link" data-toggle="modal" data-target="#replyCommentModal{{ $comment->comment_id }}">Reply</button>
              </div>
            </div>

            <!-- reassign variable to check comment for parent -->
            @php
              $previousCommentId = $comment->comment_parent_id;
            @endphp
          @else
            <!-- Comments that are first level subcomments -->
            <div class="reply">
              <div class="replyline">
                <div class="reply-content">
                  <div class="topline">
                    <div class="author">{{$comment->user_name}}</div>
                    <div class="date">{{$comment->date}}</div>
                  </div>
                  <div class="message">{{$comment->comment_message}}</div>
                </div>
                <div class="reply_icon">
                  <i class="bi bi-chat-left-text"></i>
                </div>
              </div>
            </div>
          
            <!-- reassign variable to check comment for parent -->
            @php
              $previousCommentId = $comment->comment_parent_id;
            @endphp                            
          @endif
        @endif



          <!-- Modal to reply to a comment -->
            <div class="modal fade" id="replyCommentModal{{ $comment->comment_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">What do you want to reply to {{$comment->user_name}}?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  @dump($comment->comment_id)
                    <form method="post" action="{{ url('create_comment_action/') }}">
                      {{csrf_field()}}
                      <!-- send post_id with the form to be able to insert into DB with comment -->
                      <input type="hidden" name="post_id" value="{{$post->post_id}}">
                      <p>
                        <label>Your Username</label>
                        <input type="text" name="author">
                      </p>
                      <p>
                        <label>Reply</label>
                        <textarea type="text" name="comment_message"></textarea>
                      </p>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" value="Reply">
                    </form>
                  </div>
                </div>
              </div>
            </div>

      @endforeach

      <!-- Div ends left column -->
    </div>
    
        <!-- right column -->
        <div class="col-sm-6">

        <!-- form to create a comment -->
          <form method="post" action="{{url("create_comment_action")}}">
            {{csrf_field()}}
            <h3>Comment on this Post</h3>
              <!-- send post_id with the form to be able to insert into DB with comment -->
              <input type="hidden" name="post_id" value="{{$post->post_id}}">
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
                <textarea type="text" name="comment_message"></textarea>
              </p>
            <input type="submit" value="Comment">
          </form>
        </div>
  </div>

  <a href="{{url("/")}}"><i class="bi bi-arrow-left-square-fill"></i> Back</a>
</div><!-- /.container -->



@endsection
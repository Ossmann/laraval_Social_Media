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

<!-- @dump($post)
@dump($comments) -->

<div class="container">
<h1>Details</h1>

  <div class = "row" id="content">

    <!-- left column -->
    <div class="col-sm-6">

      <div class="post">
            <p><h3>{{$post->post_title}}</h3></p>
            <!-- Edit Post Button trigger modal -- add the comment variable to the data target -->
            <div id="editPostButton">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editPostModal">Edit Post
            </button>
            </div>
              <div class="author">{{$post->user_name}}</div>
              <div class="date">{{$post->date}}</div>
            <div class="message">{{$post->message}}</div>

            

            <!-- Modal -->
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
                          <label>Post Title</label>
                          <textarea type="text" name="post_title">{{$post->post_title}}</textarea>
                        </p>
                        <p>
                          <label>Post Message</label>
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


            <!-- Condition either Author form or Like Button with Button to add author -->
            @if ($like_toggle)
              <form method="post" action="{{url("create_like_action/{$post->post_id}")}}">
                {{csrf_field()}}
                  <p>
                    <input type="text" name="author" placeholder="Enter user name">
                  </p>
                <input type="submit" value="Like">
              </form>
            @else
              <!-- //Like Button -->
              <div class="like">
                <div class="like_button">
                <a class="nav-link" href="{{url("like_input/{$post->post_id}")}}"><i class="bi bi-hand-thumbs-up-fill"></i></a>
                </div>
                {{$post->like_count}}
              </div>
            @endif

      </div>
      @foreach($comments as $comment)
        <div class="comment">
          <div class="commentline">
            
            <!-- Button trigger modal -- add the comment variable to the data target -->
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal{{ $comment->comment_id }}">
            <i class="bi bi-arrow-return-right"></i>Reply</a>
            </button>

            <i class="bi bi-chat-right-text-fill"></i>
            <div class="comment-content">
              <div class="topline">
                <div class="author">{{$comment->user_name}}</div>
                <div class="date">{{$comment->date}}</div>
              </div>
              <div class="message">{{$comment->comment_message}}</div>
            </div>
          </div>
            

            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $comment->comment_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <form method="post" action="{{ url('create_reply_action/' . $comment->post_id . '/' . $comment->comment_id) }}">
                      {{csrf_field()}}
                      <p>
                        <label>Your Username</label>
                        <input type="text" name="author">
                      </p>
                      <p>
                        <label>Reply</label>
                        <textarea type="text" name="reply_message"></textarea>
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

            <!-- Button trigger modal -- add the comment variable to the data target -->
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal{{ $comment->comment_id }}">
            Reply<i class="bi bi-arrow-return-left"></i></a>
            </button>

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
            <p>Comment on this Post</p>
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
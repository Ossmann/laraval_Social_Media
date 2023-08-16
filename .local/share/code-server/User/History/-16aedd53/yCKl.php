<!-- Home Page -->

@extends('layouts.master')

@section('title')
  Hompage - List of Posts
@endsection

@section('content')

<h1>Home Page - List of Posts</h1>

    <!-- left column -->
    <div class="col-sm-6">

      @if ($posts)
        <ul>
            @foreach($posts as $post)
                <div id="post">
                    <!-- Check the value of the $edditToggle variable -->
                    @if ($edditToggle == false)
                        <div id="title">{{$post->post_title}}</div>
                        <div id="author">{{$post->user_name}}</div>
                        <div id="message">{{$post->message}}</div>

                        <!-- Delete Post Button -->
                        <div id="delete"><a href="{{url("delete_post/$post->post_id")}}">Delete</a></div>

                        <!-- Edit Post Button -->
                        <div id="edit"><a href="{{url("edit_post/$post->post_id")}}">Edit</a></div>
                    @else
                        <form method="post" action="{{url("edit_post_action")}}">
                            {{csrf_field()}}
                            <div id="title">{{$post->post_title}}</div>
                            <p>
                                <label>Author</label>
                                <input type="text" name="author">
                            </p>
                            <p>
                                <label>Message</label>
                                <textarea type="text" name="message"></textarea>
                            </p>
                            <input type="submit" value="Complete">
                        </form>
                    @endif
                </div>
            @endforeach
            </ul>
        @else
            No posts found
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
  @endsection
@extends('layouts.master')

@section('title')
  Hompage - List of Posts
@endsection

@section('content')

<h1>Home Page - List of Posts</h1>

    <!-- left column -->
    <div id="col-sm-6">

      @if ($posts)
        <ul>
          @foreach($posts as $post)
          <div class="post">
            <div id="title">{{$post->post_title}}</div>
            <div id="author">{{$post->user_name}}</div>
            <div id="message">{{$post->message}}</div>
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
          <form method="post" action="{{url("add_item_action")}}">
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
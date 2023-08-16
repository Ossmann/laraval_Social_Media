@extends('layouts.master')

@section('title')
  Hompage - List of Posts
@endsection

@section('content')

<h1>Home Page - List of Posts</h1>

    <!-- left column -->
    <div class="col-sm-5">

      @if ($items)
        <ul>
          @foreach($posts as $post)
            <li>{{$item->id}}</li>
          @endforeach
        </ul>
        @else
          No item found
      @endif

    </div>

        <!-- right column -->
        <div class="col-sm-4">

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
          </form>
  @endsection
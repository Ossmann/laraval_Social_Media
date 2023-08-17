<!-- Home Page -->

@extends('layouts.master')

@section('title')
  Users - List of Users
@endsection

@section('nav_links')
  <li class="nav-item">
    <a class="nav-link" href="{{url("/")}}">Posts</a>
  </li>
  <li class="nav-item active">
    <a class="nav-link" href="{{url("users")}}">Users</a>
  </li>
@endsection

@section('content')

<h1>Users - List of Users</h1>

      @if ($users)
        <ul>
          @foreach($users as $user)
          <div id="user">
            <div id="user">{{$user->user_name}}
              <!-- //Delete Post Button -->
              <div class="delete">
                <a href="{{url("delete_post/$post->post_id")}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
                </svg>
                  Delete</a>
              </div>
            </div>

          </div>
          @endforeach
        </ul>
        @else
          No post found
      @endif

    </div>

  @endsection
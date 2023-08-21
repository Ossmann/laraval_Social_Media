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

<div class="container">

<h1>Users - List of Users</h1>

      @if ($users)
        <ul>
          @foreach($users as $user)
          <div id="user">
            <div id="user">{{$user->user_name}}
              <!-- //Delete Post Button -->
              <div class="delete">
                <a href="{{url("delete_user/$user->user_name")}}">
                  <i class="bi bi-dash-circle-fill"></i>
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
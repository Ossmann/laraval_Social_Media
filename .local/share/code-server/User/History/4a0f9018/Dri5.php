<!-- Home Page -->

@extends('layouts.master')

@section('title')
  Users - List of Users
@endsection

@section('content')

<h1>Users - List of Users</h1>

      @if ($users)
        <ul>
          @foreach($users as $user)
          <div id="user">
            <div id="user">{{$user->user_name}}</div>

          </div>
          @endforeach
        </ul>
        @else
          No post found
      @endif

    </div>

  @endsection
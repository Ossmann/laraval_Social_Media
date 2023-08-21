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

        @if ($users)
          <table>
            <tr>
              <th>List of Users</th>
              <th></th>
            </tr>

            @forelse ($users as $user)
                    @if ($loop->index %2 == 0)
            <tr class="alt">
              <td>
                <div id="user">{{$user->user_name}}
              </td>
              <td>
                  <!-- //Delete Post Button -->
                  <div class="delete">
                    <a href="{{url("delete_user/$user->user_name")}}">
                      <i class="bi bi-dash-circle-fill"></i>
                      Delete</a>
                  </div>
                </div>
              </td>
            </tr>
            @else
              <tr>
                <td>
                  <div id="user">{{$user->user_name}}
                </td>
              <td>
                  <!-- //Delete Post Button -->
                  <div class="delete">
                    <a href="{{url("delete_user/$user->user_name")}}">
                      <i class="bi bi-dash-circle-fill"></i>
                      Delete</a>
                  </div>
                </div>
              </td>
            </tr>
                    @endif 
            @empty
                <tr><td colspan=2>No Users available</td></tr>
            @endforelse

      </table>
          @else
            No post found
        @endif

      </div>
</div>
  @endsection
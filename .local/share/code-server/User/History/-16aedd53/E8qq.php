@extends('layouts.master')

@section('title')
  Hompage - List of Posts
@endsection

@section('content')

<h1>Home Page - List of Posts</h1>

    <!-- left column -->
    <div class="col-sm-5">
                <h3>Jakob Ossmann</h3>
                <div id="post">
                    <div class="row">
                        <div class="col-sm-5">
                          <!-- First nested column -->
                          <img src="../task2/images/alaba.jpg" style="width:80px;height:80px;">
                        </div>
                        <div class="col-sm-7">
                          <!-- Second nested column -->
                          <div id="date">Date Time</div>
                          <p>message</p>
                        </div>
                      </div>
                </div>

                <div id="post">
                    <div class="row">
                        <div class="col-sm-5">
                          <!-- First nested column -->
                          <img src="../task2/images/arnautovic.jpg" style="width:80px;height:80px;">
                        </div>
                        <div class="col-sm-7">
                          <!-- Second nested column -->
                          <div id="date">Date Time</div>
                          <p>message</p>
                        </div>
                      </div>
                </div>

                <div id="post">
                    <div class="row">
                        <div class="col-sm-5">
                          <!-- First nested column -->
                          <img src="../task2/images/Neymar.jpeg" style="width:80px;height:80px;">
                        </div>
                        <div class="col-sm-7">
                          <!-- Second nested column -->
                          <div id="date">Date Time</div>
                          <p>message</p>
                        </div>
                      </div>
                </div>
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
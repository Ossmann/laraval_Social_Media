@extends('layouts.master')

@section('title')
  Hompage - List of Posts
@endsection

@section('content')

<h1>Items</h1>

left column
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
      </div>
    </div>
@endsection
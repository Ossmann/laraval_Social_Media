@extends('layouts.master')

@section('title')
  Add Item
@endsection

@section('content')
<h1>Add Item</h1>
  <form method="post" action="add_item_action">
    {{csrf_field()}}

    <label>Summary</label>




    <tr><td>Your name:</td> <td><input type="text" name="name"></td></tr>
    <tr><td>Your age:</td> <td><input type="text" name="age"></td></tr>
    <tr><td colspan=2><input type="submit" value="Submit"></td></tr>

  </form>
@endsection
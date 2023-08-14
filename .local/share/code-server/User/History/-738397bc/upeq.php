@extends('layouts.master')

@section('title')
  Add Item
@endsection

@section('content')
<h1>Add Item</h1>
  <form method="post" action="add_item_action">
    {{csrf_field()}}

    <label>Summary</label>
    <input type="text" name="summary">
    <label>Details</label>
    <textarea type="text" name="details"></textarea>
    <input type="submit" value="Add">

  </form>
@endsection
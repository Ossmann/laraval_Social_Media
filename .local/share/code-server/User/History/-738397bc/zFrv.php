@extends('layouts.master')

@section('title')
  Add Item
@endsection

@section('content')
  <h2>Update Item</h2>

  <form method="post" action=" {{url("update_item_action")}}">
  {{csrf_field()}}
  <input type="hidden" name="id" value="{{ $item ?? ''->id }}"> <p>
  <input type="hidden" name="id" value="{{ $item->id ?? '' }}">

  <label>Summary: </label>
  <input type="text" name="summary“ value="{{$item ?? ''->summary }}"> </p>
  <p>
  <label>Details:</label>
  <textarea name="details">{{ $item ?? ''->details }}</textarea>
  </p>
  <input type="submit" value="Update item"> </form>

@endsection
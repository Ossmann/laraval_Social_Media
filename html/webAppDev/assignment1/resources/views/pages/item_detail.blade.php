@extends('layouts.master')

@section('title')
  Item list
@endsection

@section('content')

    <p><h1>{{$item->summary}}</h1></p>
    <p>{{$item->details}}</p>

    <!-- Look into the lecture notes how to delet -->
    <a href="{{url("delete_item/$item->id")}}">Delete this item</a> <br><br>
    <a href="{{url("update_item/$item->id")}}">Update this item</a> <br><br>
    
    <a href="{{url("/")}}">Home</a>

@endsection
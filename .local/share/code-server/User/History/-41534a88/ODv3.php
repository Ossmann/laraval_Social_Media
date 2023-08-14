@extends('layouts.master')

@section('title')
  Item list
@endsection

@section('content')

    <p><h1>{{$item->summary}}</h1></p>
    <p>{{$item->details}}</p>

    //Look into the lecture notes how to delet
    <a href="{{url("item_delete/$item->id")}}">Delete this item</a> <br>
    <a href="{{url("item_update/$item->id")}}">Update this item</a><br>
    <a href="{{url("item_update/$item->id")}}">Home</a>

    
@endsection
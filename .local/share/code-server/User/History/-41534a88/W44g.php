@extends('layouts.master')

@section('title')
  Item list
@endsection

@section('content')

    <p><h1>{{$item->summary}}</h1></p>
    <p>{{$item->details}}</p>

    
    <a href="{{url("item_delete/$item->id")}}">Delete this item</a>
    <a href="{{url("item_delete/$item->id")}}">Update this item</a>

    
@endsection
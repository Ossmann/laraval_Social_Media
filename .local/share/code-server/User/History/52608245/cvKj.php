@extends('layouts.master')

@section('title')
  Item list
@endsection

@section('content')
  @foreach($items as $item)
    <p><a href="url(item_detail/{{$item->id}}">{{$item->summary}}</a></p>
  @endforeach
    
@endsection
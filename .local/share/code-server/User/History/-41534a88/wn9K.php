@extends('layouts.master')

@section('title')
  Item list
@endsection

@section('content')

    <p><a href="item_detail/{{$item->id}}">{{$item->summary}}</a></p>
    
@endsection
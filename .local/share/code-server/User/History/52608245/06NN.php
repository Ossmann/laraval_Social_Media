@extends('layouts.master')

@section('title')
  Item list
@endsection

@section('content')
  @foreach($items as $item)
    <p><a href="item_detail/$itmem->id}}">{{$item->summary}}: {{$item->details}}</a></p>
  @endforeach
    
@endsection
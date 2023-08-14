@extends('layouts.master')

@section('title')
  Item list
@endsection

@section('content')
  @foreach($items as $item)
    <p>{{$item->summary}}: {{$item->details}}</p>
  @endforeach
    
@endsection
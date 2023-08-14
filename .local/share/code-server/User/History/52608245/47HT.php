@extends('layouts.master')

@section('title')
  Item list
@endsection

@section('content')
  @foreach($items as $item)
    {{$item->summary}}: {{$item->details}}
  @endforeach
    
@endsection
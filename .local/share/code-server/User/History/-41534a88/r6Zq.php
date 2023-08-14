@extends('layouts.master')

@section('title')
  Item list
@endsection

@section('content')

    <p><h1>{{$item->summary}}</h1></p>
    <p>{{$item->details}}</p>

    <a href="{{url("item_detail/$item->id")}}">{{$item->summary}}</a>
    
@endsection
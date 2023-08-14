@extends('layouts.master')

@section('title')
  Item list
@endsection

@section('content')
    {{dd($items)}}
@endsection
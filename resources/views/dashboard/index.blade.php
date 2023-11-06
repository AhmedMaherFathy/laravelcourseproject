@extends('layout.layout')
@section('page-header')
@if(Session::has('success'))
    <p class="alert alert-success">{{session()->get('success')}}</p>
@endif
<x-page-header title="Dashboard"/>
@endsection
@section('content')
    <x-statistics />
@endsection
@extends('templates/master')

@section('head')
<link href='/css/about.css' rel='stylesheet'>
@endsection

@section('title')
Support & Contact Info
@endsection

@section('content')
<h2> Support and contact info </h2>
<p> Email us at {{ $email }} </p>
@endsection
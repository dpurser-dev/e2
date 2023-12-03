@extends('templates/master')

@section('page-title')
{{ $place_name }}
@endsection

@section('page-intro')
<hr>
<p>{{ $place_text }}</p>
@endsection

@section('page-content')
<hr>

<img id='place-image' src='/images/places/{{ $place_image }}.png'>

<hr>
<p>Pin a fixed-height footer to the bottom of the viewport in desktop browsers with this custom
    HTML and CSS. A fixed navbar has been added width
</p>
@endsection
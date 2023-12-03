@extends('templates/master')

@section('page-title')
{{ $welcome }}
@endsection

@section('page-intro')
<p>Hello and welcome! This is the boilerplate splash page for my application built with <a
        href='https://github.com/susanBuck/e2framework'>e2framework</a>.</p>
@endsection

@section('page-content')

<p>Back to <a href="../sticky-footer/">the default sticky footer</a> minus the navbar.</p>
<img id="map-image" src='/images/tm-map.png'>
<p>Pin a fixed-height footer to the bottom of the viewport in desktop browsers with this custom
    HTML and CSS. A fixed navbar has been added width
</p>

@endsection
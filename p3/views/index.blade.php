@extends('templates/master')

@section('page-title')
Welcome to the world of TecheMono!
@endsection

@section('user-info')
<b>Logged in as: </b> {{ $user['username'] }}
@endsection

@section('page-intro')
<hr>
<h3>We are so pleased to welcome you back.</h3>
<p>The <b>TecheMono official calendar</b> indicates that the date today is: XXX </br>
    The <b>Official TecheMetreological Society</b> is advising weather conditions of: XXX</p>
<h4>Enjoy exploring!</h4>
@endsection

@section('page-content')
<hr>

<p>Where would you like to go?

<form method='POST' action="/route-place">
    <select id="place" name="place">
        <option value="adopt">Adoption Centre</option>
        <option value="bank">Bank</option>
        <option value="user">Home</option>
        <option value="store-general">General Store</option>
        <option value="store-toy">Toy Store</option>
    </select>
    <button type="submit" id="button-override">Let's go!</button>
</form>

</p>
<img id="map-image" src='/images/tm-map.png'>
<hr>
<p>Pin a fixed-height footer to the bottom of the viewport in desktop browsers with this custom
    HTML and CSS. A fixed navbar has been added width
</p>
@endsection
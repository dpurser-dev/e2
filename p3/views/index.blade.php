@extends('templates/master')

@section('page-title')
Welcome to the world of TecheMono!
@endsection

@section('user-info')
@if ($user)
<b>Logged in as:</b>
<div id="username-text">{{ $user['username'] }}</div>
@endif
@endsection

@section('logout-button')
@if ($user)
<ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="/route-logout"><button class="btn" id="button-override"
                type=button>Logout</button></a>
    </li>
</ul>
@endif
@endsection

@section('page-intro')
<hr>
<h3>We are so pleased to welcome you back.</h3>
<p>The <b>TecheMono official calendar</b> indicates that the date today is: {{ $date }} </br>
    The <b>Official TecheMetreological Society</b> is advising weather conditions of: {{ $weather }}</p>
<h4>Enjoy exploring!</h4>
@endsection

@section('page-content')
<hr>

<p>Where would you like to go?

<form method='POST' action="/route-place">
    <select id="place" name="place">
        <option value="adopt">Adoption Centre</option>
        <option value="bank">Bank</option>
        <option value="home">Home</option>
        <option value="store-general">General Store</option>
        <option value="store-special">Special Store</option>
    </select>
    <button type="submit" id="button-override">Let's go!</button>
</form>

</p>
<img id="map-image" src='/images/tm-map-labelled.png'>
<hr>
<p>Please use the dropdown menu above to navigate the map - in the future, the map itself will be clickable, so stay
    tuned!
</p>
@endsection
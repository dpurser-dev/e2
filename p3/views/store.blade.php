@extends('templates/master')

@section('page-title')
{{ $store_name }}
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
<img id='place-image' src='/images/places/{{ $store_image }}.png'>
<hr>
<p>{{ $store_text }}</p>
@endsection

@section('page-content')
<hr>
@for ($i = 1; $i <= $items; $i++) <div id='object-container'>
    <img id='object-image' src='/images/omlettes/o1.png'>
    <p>Delicious omlette <br>
        <b>Cost:</b> 100tm<br>
        <b>Rarity:</b> Common
    </p>
    <button id="button-override">Buy</button>
    </div>
    @endfor

    <p>Pin a fixed-height footer to the bottom of the viewport in desktop browsers with this custom
        HTML and CSS. A fixed navbar has been added width
    </p>
    @endsection
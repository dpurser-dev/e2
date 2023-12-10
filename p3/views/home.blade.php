@extends('templates/master')

@section('page-title')
{{ $place_name }}
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
<img id='place-image' src='/images/places/{{ $place_image }}.png'>
<hr>
<p>{{ $place_text }}</p>

<hr>

<p>Your pet</p>

<div id='object-container'>
    <img id='object-image' src='/images/pets/{{ $pet[0]["image"]}}'>
    <p>Number {{ $pet[0]['id'] -1 }}<br>
        <b>Species:</b> {{ $pet[0]['species']}}<br>
        <b>Rarity:</b> <span id='rarity-{{$pet["rarity_id"]}}'>{{ $rarity[$pet[0]['rarity_id'] - 1]['name'] }}</span>
    </p>
</div>

<hr>

<p>Your items</p>

@foreach($items as $item)

<div id='object-container'>
    <img id='object-image' src='/images/{{ $item[0]["image"]}}'>
    <p>{{ $item[0]['name'] }}<br>
        <b>Cost:</b> {{ $item[0]['cost']}}<br>
        <b>Rarity:</b> <span
            id='rarity-{{$item[0]["rarity_id"]}}'>{{ $rarity[$item[0]['rarity_id'] - 1]['name'] }}</span>
    </p>
    <form method='POST' action="/use">
        <input type="hidden" id="id" name="id" value="{{$item[0]['id']}}">
        <button type="submit" id="button-override">Use</button>
    </form>
</div>

@endforeach


@endsection

@section('page-content')
<hr>



@endsection
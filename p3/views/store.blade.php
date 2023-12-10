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

@foreach($inventory as $item)

<div id='object-container'>
    <img id='object-image' src='/images/{{ $item["image"]}}'>
    <p>{{ $item['name'] }}<br>
        <b>Cost:</b> {{ $item['cost']}}<br>
        <b>Rarity:</b> <span id='rarity-{{$item["rarity_id"]}}'>{{ $rarity[$item['rarity_id'] - 1]['name'] }}</span>
    </p>
    <form method='POST' action="/buy">
        <input type="hidden" id="cost" name="cost" value="{{$item['cost']}}">
        <input type="hidden" id="id" name="id" value="{{$item['id']}}">
        <button type="submit" id="button-override">Buy</button>
    </form>
</div>

@endforeach

<p><b>Remember:</b> Store inventories are dynamic and change constantly. If you see something that you like, don't
    hesitate to buy it, or you might miss out!
</p>
@endsection
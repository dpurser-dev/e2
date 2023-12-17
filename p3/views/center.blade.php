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
        <a class="nav-link" href="/route-logout" test='logout-button'><button class="btn" id="button-override"
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
<p>You may view our available pets for adption below:</p>
@endsection

@section('page-content')
<hr>

@foreach($inventory as $pet)

<div id='object-container'>
    <img id='object-image' src='/images/pets/{{ $pet["image"]}}'>
    <p>Number {{ $pet['id'] -1 }}<br>
        <b>Species:</b> {{ $pet['species']}}<br>
        <b>Rarity:</b> <span id='rarity-{{$pet["rarity_id"]}}'>{{ $rarity[$pet['rarity_id'] - 1]['name'] }}</span>
    </p>
    <form method='POST' action="/adopt">
        <input type="hidden" id="id" name="id" value="{{$pet['id']}}">
        <button test='adopt-button' type="submit" id="button-override">Adopt</button>
    </form>
</div>

@endforeach

@endsection


@section('message')
@if($message)

<span id="hidden-message" test="message-type">{{$message_type}}</span>

<p class='message-{{$message_type}}'>
    <span test='message-outcome'>
        {{ $message }}
    </span>
</p>

@endif
@endsection
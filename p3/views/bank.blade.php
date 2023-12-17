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
<p>You may view your account balance below:</p>
<p><b>Account balance: </b> <span test='money-amount'>{{ $user['money'] }}<span> tm</p>
@endsection

@section('page-content')
<hr>



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
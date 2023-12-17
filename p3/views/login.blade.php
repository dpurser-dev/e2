@extends('templates/master')

@section('page-title')
Welcome to the world of TecheMono!
@endsection

@section('page-intro')
<hr>
<h3>Log in</h3>
@endsection

@section('page-content')
<hr>

<p>Please enter your user credentials below</p>

<form method='POST' action="/route-login">
    <label for="username">Username:</label>
    <input test="username-input" type="text" id="username" name="username" required>
    <label for="password">Password:</label>
    <input test="password-input" type="password" id="password" name="password" required>
    <button test="login-button" type="submit">Login</button>
</form>

<hr>
<p><b>Remember:</b> Do not share your password with anyone!
</p>
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
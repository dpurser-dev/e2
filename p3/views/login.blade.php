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
    <input type="text" id="username" name="username" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Login</button>
</form>

<hr>
<p><b>Remember:</b> Do not share your password with anyone!
</p>
@endsection
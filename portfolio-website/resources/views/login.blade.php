@extends('partials.layout')
<link rel="stylesheet" href="{{ asset('css/loginstyle.css') }}">

@section('title', 'My Portfolio | Login')
@section('content')

    <div class="login-container">
        <h2>Login</h2>
        @if ($errors->any())

            <div>
                <strong>Whoops! </strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    <li>
                    <li>
                </ul>
            </div>
        @endif
        <form action="/login" method="POST">
            @csrf
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>

@endsection
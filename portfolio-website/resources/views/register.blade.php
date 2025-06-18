@extends('partials.layout')
<link rel="stylesheet" href="{{ asset('css/registerstyle.css') }}">

@section('title', 'Portfolio Website | Registration')
@section('content')

    <div class="form-container">
        <h2>Register</h2>
        @if ($errors->any())
            <div>
                <strong>Whoops!<< /strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                            <li>
                            <li>
                        </ul>
            </div>
        @endif
        <form action="/register" method="post">
            @csrf
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Register</button>
        </form>
    </div>

@endsection
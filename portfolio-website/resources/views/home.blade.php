<!DOCTYPE html>
<html lang="en">
@extends('partials.layout')
<link rel="stylesheet" href="{{ asset('css/homestyle.css') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/homestyle.css') }}">
</head>
@section('title', 'My Portfolio | Home')
@section('content')

    <body>
        <div class="topnav">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
            <nav class="topnav">
                <a href="/home">Home</a>
                <a href="/about">About</a>
                <a href="/projects">Projects</a>
                <a href="/contact">Contact</a>
            </nav>
        </div>





        <div class="container">
            <section class="crafting-section">
                <div class="crafting-image">
                    <img src="data:image/jpeg;base64,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"
                        alt="Sample Image from Google">
                </div>
                <div class="crafting-text">
                    <h2>{{ $settings->welcome_heading }}</h2>
                    <p>{{ $settings->welcome_text }}</p>
                    <button class="crafting-button">View Projects</button>
                </div>


            </section>




            <section class="crafting-section">
                <h2>Featured Projects</h2>
                <div class="projects">
                    @foreach($settings->featured_projects as $project)
                        <div class="project-featured">
                            <img src="{{ $project['image_url'] }}" alt="{{ $project['title'] }}"></br>
                            <h3>{{ $project['title'] }}</h3></br>
                            <p>{{ $project['description'] }}</p>

                        </div>

                    @endforeach
                </div>
            </section>

            <section class="crafting-section">
                <h2>About Me</h2>
                <div>
                    <p>{{ $settings->about_text }}</p>
                </div>
            </section>
        </div>

    </body>

    </html>
@endsection
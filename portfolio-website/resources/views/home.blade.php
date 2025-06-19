<!DOCTYPE html>
<html lang="en">
@extends('partials.layout')
<link rel="stylesheet" href="{{ asset('css/homestyle.css') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | My Portfolio</title>
</head>
@section('title', 'My Portfolio | Home')
@section('content')

<body>
    <div class="navbar">
    <nav class="topnav">
    <div class="topnav-left">
        <h1>My Portfolio</h1>
    </div>
    <div class="topnav-right">
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/project">Projects</a>
        <a href="/contact">Contact</a>
        <a href="/resume">Resume</a>
    </div>
    </nav>
</div>
    <div class="container">
        <section class="crafting-section">
            <div class="crafting-image">
                <!-- Placeholder image -->
                <img src="https://scontent.fktm3-1.fna.fbcdn.net/v/t39.30808-6/367471761_1757484508036557_2190431347489331300_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeEZd0ldXZGNP7QgULDaNFLqrmcCPciNGvyuZwI9yI0a_Aa4_fSKOucb9_1ft_jsdykx0fo9tvCbOcUCRz3BvYEz&_nc_ohc=eujLdfiI4JQQ7kNvwFSg-AY&_nc_oc=AdlbPm6wQiHmDIbjUk45sOkYDxMml1KnysZ2P2GFhE2LixlGEjU9vTU2Pvpzs3U0BnjL0rq7it2wJPohMmDEYDxP&_nc_zt=23&_nc_ht=scontent.fktm3-1.fna&_nc_gid=7bzxFAV67XtZNaI2JnABaw&oh=00_AfOqTd55xnRA7rLyRkXq72g-seKtG1ZprCWZ67YMmyAT1A&oe=6859DC8E" alt="Image">
            </div>
            <div class="crafting-text">
                <h2>{{ $settings->welcome_heading }}</h2>
                <p>{{ $settings->welcome_text }}</p>
                <button class="crafting-button">View Projects</button>
            </div>
        </section>

        <!-- Featured Projects Section -->
        <section class="crafting-section">
            <h2>Featured Projects</h2><br>
            <div class="projects">
                @foreach($projects as $project)
                    <div class="project-card">
                        <img src="{{ asset($project->image_url) }}" alt="{{ $project->title }}" class="project-image">
                        <h3 class="project-title">{{ $project->title }}</h3>
                        <p class="project-description">{{ $project->description }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- About Me Section -->
        <section class="crafting-section">
            <h2>About Me</h2><br>
            <div>
                <p>{{ $settings->about_text }}</p>
            </div>
        </section>
    </div>

</body>

</html>
@endsection

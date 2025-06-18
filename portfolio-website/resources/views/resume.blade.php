<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sadikshya Gurung - Resume</title>
    <link rel="stylesheet" href="{{ asset('css/resume.css') }}">
</head>
<body>
    
<nav class="topnav">
    <div class="topnav-left">
        <h1 class="home-welcome">My Portfolio</h1>
    </div>
    <div class="topnav-right">
        <a href="/home">Home</a>
        <a href="/about">About</a>
        <a href="/projects">Projects</a>
        <a href="/contact">Contact</a>
        <a href="/resume">Resume</a>
    </div>
</nav>
    <div class="container">
        <header>
            <div class="photo">
                <img src="https://placehold.co/150x150" alt="Profile Photo">
            </div>
    <div class="details">
        <h1>{{ $personalDetail->name ?? 'No Name Provided' }}</h1>
        <p><strong>D.O.B:</strong> {{ \Carbon\Carbon::parse($personalDetail->dob)->format('F j, Y') ?? 'Not Provided' }}</p>
        <p><strong>Address:</strong> {{ $personalDetail->address ?? 'Not Provided' }}</p>
    </div>
        </header>
<section>
    <section>
    <h2>Skills</h2>
    <ul>
        @forelse($skills as $skill)
            <li>{{ $skill->title }}</li>
        @empty
            <li>No skills found.</li>
        @endforelse
    </ul>
</section>


<section>
    <h2>Projects</h2>
    <ul>
        @forelse($projects as $project)
            <li>{{ $project->title }}</li>
        @empty
            <li>No projects found.</li>
        @endforelse
    </ul>
</section>

    </div>
</body>
</html>

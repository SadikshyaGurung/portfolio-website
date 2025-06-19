<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sadikshya Gurung - Resume</title>
    <link rel="stylesheet" href="{{ asset('css/resume.css') }}">
</head>
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
<main>
    <div class="container">
        <header>
            <div class="photo">
                <img src="https://scontent.fktm3-1.fna.fbcdn.net/v/t39.30808-6/367471761_1757484508036557_2190431347489331300_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeEZd0ldXZGNP7QgULDaNFLqrmcCPciNGvyuZwI9yI0a_Aa4_fSKOucb9_1ft_jsdykx0fo9tvCbOcUCRz3BvYEz&_nc_ohc=eujLdfiI4JQQ7kNvwFSg-AY&_nc_oc=AdlbPm6wQiHmDIbjUk45sOkYDxMml1KnysZ2P2GFhE2LixlGEjU9vTU2Pvpzs3U0BnjL0rq7it2wJPohMmDEYDxP&_nc_zt=23&_nc_ht=scontent.fktm3-1.fna&_nc_gid=7bzxFAV67XtZNaI2JnABaw&oh=00_AfOqTd55xnRA7rLyRkXq72g-seKtG1ZprCWZ67YMmyAT1A&oe=6859DC8E" alt="Profile Photo">
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
    </main>

</body>
</html>

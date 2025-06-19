<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About</title>
    <link rel="stylesheet" href="{{ asset('css/aboutpage.css') }}">
</head>
<body>
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
<main>
    <div class="about">
        <h1>About</h1>

        <div class="photo">
            <img src="https://scontent.fktm3-1.fna.fbcdn.net/v/t39.30808-6/367471761_1757484508036557_2190431347489331300_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeEZd0ldXZGNP7QgULDaNFLqrmcCPciNGvyuZwI9yI0a_Aa4_fSKOucb9_1ft_jsdykx0fo9tvCbOcUCRz3BvYEz&_nc_ohc=eujLdfiI4JQQ7kNvwFSg-AY&_nc_oc=AdlbPm6wQiHmDIbjUk45sOkYDxMml1KnysZ2P2GFhE2LixlGEjU9vTU2Pvpzs3U0BnjL0rq7it2wJPohMmDEYDxP&_nc_zt=23&_nc_ht=scontent.fktm3-1.fna&_nc_gid=7bzxFAV67XtZNaI2JnABaw&oh=00_AfOqTd55xnRA7rLyRkXq72g-seKtG1ZprCWZ67YMmyAT1A&oe=6859DC8E" alt="Profile Photo">
            <br>
        </div>
        <div class="cc">
            <div class="email">
                <h2>{{ $personalDetail->email ?? 'Email not set' }}</h2>
            </div>
            <div class="contact">
                <h3>{{ $personalDetail->phone ?? 'Phone number not set' }}</h3>
            </div>
        </div>
        <div>
            <p>Hi! I’m Akschit, an enthusiastic beginner exploring the world of coding. 
            I recently started learning web development and love how creative it can be.
            Right now, I’m focusing on HTML, CSS, and Laravel to build real web projects.
            Every day I discover something new, and that keeps me excited to keep going.
            I enjoy solving problems and turning simple ideas into working websites.
            My goal is to become a full-stack developer and work on meaningful projects.
            I believe anyone can learn to code with patience, practice, and curiosity.
            Besides coding, I like watching tech tutorials and experimenting with small projects.
            I’m building my portfolio step by step and learning from every experience.
            I’m excited to grow as a developer and connect with others on the same journey!</p>
        </div>
    </div> 
</main>
</body>
</html>

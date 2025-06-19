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
            <p>Hi! I’m Sadikshya Gurung, a passionate learner with a love for creativity and technology. I'm currently pursuing my B.Sc. CSIT at ASCOL, where I’m building a strong foundation in computer science and IT.

Alongside my academic journey, I’m exploring the world of web development and sharpening my skills in HTML, CSS, and Laravel. I find it exciting how a few lines of code can bring an idea to life—and I enjoy every step of turning concepts into functional websites.

I also have a background in graphic design, which helps me bring a visual edge to the digital experiences I create. Whether it's designing clean layouts or crafting intuitive interfaces, I love blending aesthetics with usability.

Every day, I learn something new—be it solving a coding challenge, experimenting with a new design tool, or watching tech tutorials. I believe curiosity, patience, and consistent practice are the keys to growth.

My goal is to become a full-stack developer who can both design and build meaningful digital products. I’m excited to grow as a developer, expand my portfolio, and connect with others on this amazing journey!</p>
        </div>
    </div> 
</main>
</body>
</html>

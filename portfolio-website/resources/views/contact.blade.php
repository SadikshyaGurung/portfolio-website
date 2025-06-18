<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Portfolio Website | Contact Us</title>
    <link rel="stylesheet" href="{{asset('css/contactstyle.css')}}">
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
    <div class="container contact-box">
        <h2>Let's Connect</h2>
        <form action="{{ route('contact.submit') }}" method="POST">
    @csrf
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" rows="6" placeholder="Your Message" required></textarea>
            <button type="submit" class="next-button">Send Message</button>
        </form>
    </div>
</body>
</html>

@extends('partials.layout')
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/contactstyle.css') }}">
@section('title', 'Portfolio Website | Contact Us')
@section('content')

    <div class="contact-box">
        <h2>Let's Connect</h2>
        <form>
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" rows="6" placeholder="Your Message" required></textarea>
            <a href="nextpage.html" class="next-button">Next Page</a>
        </form>
    </div>
@endsection
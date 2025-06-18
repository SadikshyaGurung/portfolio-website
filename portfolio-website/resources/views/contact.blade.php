<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Portfolio Website | Contact Us</title>
    <link rel="stylesheet" href="{{asset('css/contactstyle.css')}}">
</head>
<body>
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

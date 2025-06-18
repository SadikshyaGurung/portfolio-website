<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>My Portfolio | Home</title>
    <link rel="stylesheet" href="{{ asset('css/homestyle.css') }}" />
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>

    <!-- Top Navigation -->
    <nav class="topnav">
        <div class="topnav-left">
            <h1 class="home-welcome">My Portfolio</h1>
        </div>
        <div class="topnav-right">
            <a href="/home">Home</a>
            <a href="/about">About</a>
            <a href="/project">Projects</a>
            <a href="/contact">Contact</a>
            <a href="/resume">Resume</a>
        </div>
    </nav>

    <div class="container">

        <!-- Welcome Section with Box -->
        <section class="crafting-sectionn">
            <div class="crafting-image">
                <img src="https://via.placeholder.com/600x400?text=Placeholder+Image" alt="Placeholder Image" />
            </div>
            <div class="crafting-text">
                <h2>Welcome to My Portfolio</h2>
                <p>This is where you can showcase your projects and tell visitors about yourself.</p>
                <a href="#featured-projects" class="crafting-button">View Projects</a>
            </div>
        </section>

        <!-- What I Do Section (No Box) -->
        <section class="crafting-section">
            <h2 class="section-title">What I Do</h2>
            <div class="what-i-do">
                <div class="do-card">
                    <span class="icon">🎨</span>
                    <h3>Graphics Design</h3>
                    <p>Aspiring graphics designer eager to explore the world of visual communication and design.</p>
                </div>
                <div class="do-card">
                    <span class="icon">💻</span>
                    <h3>Frontend Developer</h3>
                    <p>Crafting captivating user experiences with clean code and creative design.</p>
                </div>
            </div>
        </section>

        <!-- Featured Projects (Anchor Target) -->
        <section id="featured-projects" class="crafting-section boxed">
            <h2>Featured Projects</h2>
            <div class="projects">
                @foreach ($projects as $project)
                    <div class="project-featured">
                        <img src="{{ asset('storage/' . $project->image_path) }}" alt="Project Image" />
                        <h3>{{ $project->title }}</h3>
                        <p>{{ $project->description }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- About Me Section (No Box) -->
        <section class="crafting-section">
            <h2>About Me</h2>
            <div>
                <p>This is a brief paragraph about yourself, your experience, and your skills.</p>
            </div>
        </section>

    </div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>My Portfolio | Home</title>
    <link rel="stylesheet" href="{{asset('css/homestyle.css')  }}" />
</head>
<body>
    <nav class="topnav">
        <div class="topnav-left">
            <h1 class="home-welcome">My Portfolio</h1>
        </div>

        <!-- Search form commented out in original, so skipped -->

        <div class="topnav-right">
            <a href="/home">Home</a>
            <a href="/about">About</a>
            <a href="/project">Projects</a>
            <a href="/contact">Contact</a>
            <a href="/resume">Resume</a>
        </div>
    </nav>

    <div class="container">
        <section class="crafting-section">
            <div class="crafting-image">
                <img src="https://via.placeholder.com/600x400?text=Placeholder+Image" alt="Placeholder Image" />
            </div>
            <div class="crafting-text">
                <h2>Welcome to My Portfolio</h2>
                <p>This is where you can showcase your projects and tell visitors about yourself.</p>
                <button class="crafting-button">View Projects</button>
            </div>
        </section>

       <section class="crafting-section">
    <h2>Featured Projects</h2>
    <div class="projects">
       @foreach ($projects as $project)
    <div class="project-featured">
       <img src="{{ asset('storage/' . $project->image_path) }}" alt="Project Image" />
  <h3>{{ $project->title }}</h3><br />
        <p>{{ $project->description }}</p>
    </div>
@endforeach

    </div>
</section>


        <section class="crafting-section">
            <h2>About Me</h2>
            <div>
                <p>This is a brief paragraph about yourself, your experience, and your skills.</p>
            </div>
        </section>
    </div>

</body>
</html>

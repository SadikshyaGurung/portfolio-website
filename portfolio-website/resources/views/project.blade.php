<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Project Portfolio</title>
  <link rel="stylesheet" href="{{asset('css/project.css')}}">
</head>
<body>
 <nav class="topnav">
    <div class="topnav-left">
        <h1>My Portfolio</h1>
    </div>
    <div class="topnav-right">
        <a href="/home">Home</a>
        <a href="/about">About</a>
        <a href="/project">Projects</a>
        <a href="/contact">Contact</a>
        <a href="/resume">Resume</a>
    </div>
</nav>
<div class="main">
  <h1>📁 My Project Portfolio</h1>
<div class="container">
  @foreach ($projects as $project)
    <div class="box">
      <div class="img-placeholder">
        @if($project->image_url)
          <img src="{{ asset('storage/' . $project->image_path) }}" alt="Project Image" />
 @else
          <span>No Image</span>
        @endif
      </div>
      <div class="text-content">
        <div class="project-name">{{ $project->title }}</div>
        <div class="description">{{ $project->description }}</div>
      </div>
    </div>
  @endforeach
 </div>
</div>
</body>
</html>
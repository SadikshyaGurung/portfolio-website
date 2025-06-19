<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Project Portfolio</title>
  <link rel="stylesheet" href="{{asset('css/project.css')}}">
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
<div class="main">
<div class="container">
  <h1>📁 My Project Portfolio</h1>
  @foreach ($projects as $project)
    <div class="box">
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
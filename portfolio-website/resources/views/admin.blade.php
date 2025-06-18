<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
</head>
<body>
  <aside>
    <div class="sidebar">
      <h2 class="home">Admin Panel</h2>
      <ul>
       <li id="dashboard"><a href="{{ route('admin') }}"> 🏠 Dashboard</a></li>
        <li id="projects"><a href="projectdash"> &#x1F4C8; Projects</a></li>
        <li id="skills"><a href="skilldash">&#x1F4BB; Skills</a></li>
        <li id="contacts"><a href="contactdash">&#x1F4E7; Contacts</a></li>
      </ul>
    </div>
  </aside>
  
  <main>
    <h1>Dashboard</h1><br>
    <div class="board">
  <div class="Projectboard">
    <h2 class="pb">Project</h2>
    <h2 class="pb">{{ $projectCount ?? 'N/A' }}</h2>
  </div>
  
  <div class="Skillboard">
    <h2 class="sb">Skill</h2>
    <h2 class="sb">{{ $skillCount ?? 'N/A' }}</h2>
  </div>
</div>


    <br>
    <div class="recent-projects">
      <h2>Recent Projects</h2>
      <br>
      <div class="grid-header">
        <div>Title</div>
        <div>Description</div>
        <div>Skills</div>
        <div>Actions</div>
      </div>

      <div class="grid-container">
  @foreach ($recentProjects as $project)
    <div class="grid-item">{{ $project->title }}</div>
    <div class="grid-item">{{ $project->description }}</div>
    <div class="grid-item">{{ $project->skills }}</div>
    <div class="grid-item"><a href="{{ url('projectedit/' . $project->id) }}">Edit</a></div>
  @endforeach
</div>

    </div>
  </main>
</body>
</html>

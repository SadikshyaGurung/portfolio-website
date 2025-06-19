<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>

  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
</head>

<body>
  <aside>
    <div class="sidebar">
      <h2 class="home">Admin Panel</h2>
      <ul>
        <li id="dashboard"><a href="{{ route('admin') }}"> 🏠 Dashboard</a></li>
        <li id="home-edit"><a href="home/edit"> 📈 Home Page Settings</a></li>
        <li id="projects"><a href="projectdash"> 📁 Projects</a></li>
        <li id="skills"><a href="skilldash">💻 Skills</a></li>
        <li id="contacts"><a href="contactdash">📧 Contacts</a></li>
         <li><a href="{{ route('personal') }}">👤 Personal Details</a></li>


      </ul>

      <!-- Logout button at the bottom -->
      <form method="POST" action="{{ route('logout') }}" style="display: inline;">
        @csrf
        <button type="submit" style="background:none; border:none; padding:0; cursor:pointer; color:blue; text-decoration:underline;">
            Logout
        </button>
      </form>
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
    <div class="grid-item">
  @if (!empty($project->skills) && is_iterable($project->skills))
    @foreach ($project->skills as $skill)
      {{ $skill->name }}{{ !$loop->last ? ', ' : '' }}
    @endforeach
  @else
    <em>No skills</em>
  @endif
</div>

    <div class="grid-item">
      <a href="{{ url('projectedit/' . $project->id) }}">Edit</a>
    </div>
  @endforeach
</div>


    </div>
  </main>
</body>

</html>
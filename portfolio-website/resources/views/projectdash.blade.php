<!DOCTYPE html>
<html lang="en">
<head>
  <title>Projects Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/projectdash.css') }}">
</head>
<body>
  <aside>
    <div class="sidebar">
      <h2 class="home">Admin Panel</h2>
      <ul>
        <li><a href="{{ route('admin') }}">🏠 Dashboard</a></li>
        <li><a href="projectdash">📈 Projects</a></li>
        <li><a href="skilldash">💻 Skills</a></li>
        <li><a href="contactdash">📧 Contacts</a></li>
      </ul>

      <!-- Logout at bottom -->
      <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit" class="logout-button">Logout</button>
      </form>
    </div>
  </aside>

  <main>
    <h2>Projects Table</h2>
    <p><a href="{{ route('project.create') }}">Add Project</a></p>

    @if(session('success'))
      <p style="color: green;">{{ session('success') }}</p>
    @endif

    <div class="grid-header">
      <div>Project ID</div>
      <div>Title</div>
      <div>Description</div>
      <div>Skills</div>
      <div>Actions</div>
    </div>
<div class="grid-container">
  @foreach ($projects as $project)
    <div class="grid-item">{{ $project->project_id }}</div>
    <div class="grid-item">{{ $project->title }}</div>
    <div class="grid-item">{{ $project->description }}</div>
    <div class="grid-item">
      @php
        $skillIds = explode(',', $project->skills);
        $skillTitles = \App\Models\Skill::whereIn('id', $skillIds)->pluck('title')->toArray();
      @endphp
      {{ implode(', ', $skillTitles) }}
    </div>
    <div class="grid-item">
      <a href="{{ route('project.edit', $project->id) }}">Edit</a>
      <form action="{{ route('project.destroy', $project->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this project?');">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
      </form>
    </div>
  @endforeach
</div>

  </main>
</body>
</html>

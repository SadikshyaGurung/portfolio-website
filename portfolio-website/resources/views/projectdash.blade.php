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
    <h2>Projects Table</h2>
    <p><a href="{{ route('project.create') }}">Add Project</a></p>

    @if(session('success'))
      <p style="color: green;">{{ session('success') }}</p>
    @endif

    <div class="grid-header">
      <div>Project ID</div>
      <div>Title</div>
      <div>Description</div>
      <div>Actions</div>
    </div>

    <div class="grid-container">
  @foreach ($projects as $project)
    <div class="grid-item">{{ $project->project_id }}</div>
    <div class="grid-item">{{ $project->title }}</div>
    <div class="grid-item">{{ $project->description }}</div>
    
    <div class="grid-item">
      <form action="{{ route('project.destroy', $project->project_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this project?');">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
      </form>
    </div>
  @endforeach
</div>
<div class="next">
            {{$projects->links()}}
</div> 
  </main>
</body>

</html>

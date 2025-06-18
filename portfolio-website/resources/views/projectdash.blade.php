<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/projectdash.css') }}">
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
    <h3>Project Table</h3>
    <p><a href="{{ route('project.create') }}">Add Project</a></p>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Project ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Skills</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($projects as $project)
            <tr>
                <td>{{ $project->project_id }}</td>
                <td>{{ $project->title }}</td>
                <td>{{ $project->description }}</td>
                <td>
                    @php
                        $skillIds = explode(',', $project->skills);
                        $skillTitles = \App\Models\Skill::whereIn('id', $skillIds)->pluck('title')->toArray();
                    @endphp
                    {{ implode(', ', $skillTitles) }}
                </td>
                <td>
                    <a href="{{ route('project.edit', $project->id) }}">Edit</a>
                    <form action="{{ route('project.destroy', $project->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this project?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</main>
</body>
</html>

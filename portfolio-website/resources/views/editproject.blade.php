<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Project</title>
</head>
<body>
    <h2>Edit Project</h2>
    <form action="{{ route('project.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Title:</label><br>
        <input type="text" name="title" value="{{ $project->title }}"><br><br>

        <label>Description:</label><br>
        <textarea name="description">{{ $project->description }}</textarea><br><br>

        <label>Skills:</label><br>
        @php
            $selectedSkills = explode(',', $project->skills);
        @endphp
        @foreach ($skills as $skill)
            <input type="checkbox" name="skills[]" value="{{ $skill->id }}"
                {{ in_array($skill->id, $selectedSkills) ? 'checked' : '' }}>
            {{ $skill->title }}<br>
        @endforeach
        <br>

        <button type="submit">Update</button>
    </form>
</body>
</html>

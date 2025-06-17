<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Project</title>
</head>
<body>
    <h2>Add New Project</h2>
    <form action="{{ route('project.store') }}" method="POST">
        @csrf
        <label>Project ID:</label><br>
        <input type="text" name="project_id"><br><br>

        <label>Title:</label><br>
        <input type="text" name="title"><br><br>

        <label>Description:</label><br>
        <textarea name="description"></textarea><br><br>

        <label>Skills:</label><br>
        @foreach ($skills as $skill)
            <input type="checkbox" name="skills[]" value="{{ $skill->id }}"> {{ $skill->title }}<br>
        @endforeach
        <br>

        <button type="submit">Save</button>
    </form>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Add Skill</title>
    <link rel="stylesheet" href="{{ asset('css/addskill.css') }}">
</head>
<body>
    <h2>Add Skill</h2>

    <form action="{{ route('skill.store') }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required><br>

        <button type="submit">Save</button>
    </form>
</body>
</html>

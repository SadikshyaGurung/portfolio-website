<!DOCTYPE html>
<html>
<head>
    <title>Add Skill</title>
</head>
<body>
    <h2>Add Skill</h2>

    <form action="{{ route('skill.store') }}" method="POST">
    @csrf
    <label>Title:</label>
    <input type="text" name="title" required><br>

    <label>Description:</label>
    <input type="text" name="description" required><br>

    <label>Skills:</label>
    <input type="text" name="skills" required><br>

    <button type="submit">Save</button>
</form>

</body>
</html>

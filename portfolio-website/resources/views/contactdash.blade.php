<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/message.css') }}">

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
    <h3>Contact Table</h3>

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        
    </table>

</main>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
     <link rel="stylesheet" href="{{ asset('css/skilldash.css') }}" />
</head>
<body>
     <aside>
    <div class="sidebar">
      <h2 class="home">Admin Panel</h2>
      <ul>
       <li id="dashboard"><a href="admin"> &#x1F3E0; Dashboard</a></li>
        <li id="projects"> <a href="projectdash"> &#x1F4C8; Projects</a></li>
        <li id="skills"><a href="skilldash">&#x1F4BB; Skills</a></li>
        <li id="contacts">
          
          &#x1F4E7; Contacts
        </li>
      </ul>
    </div>
  </aside>
<main>
    <h2>Skills Table</h2>
<p><a href="addskill">Add Skill</a></p>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif
 <div class="grid-header">
        <div>Title</div>
        <div>Description</div>
        <div>Skills</div>
        <div>Actions</div>
      </div>

<div class="grid-container">
   @foreach ($skills as $skill)
    <div class="grid-item">{{ $skill->title }}</div>
    <div class="grid-item">{{ $skill->description }}</div>
    <div class="grid-item">{{ $skill->skills }}</div>
    <div class="grid-item"><a href="#">Edit</a></div>
@endforeach

</div>
   </main>
</body>
</html>
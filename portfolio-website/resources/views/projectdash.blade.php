<!DOCTYPE html>
<html lang="en">
<head>
     <link rel="stylesheet" href="{{ asset('css/projectdash.css') }}" />
</head>
<body>
     <aside>
    <div class="sidebar">
      <h2 class="home">Admin Panel</h2>
      <ul>
        <li id="dashboard">
          &#x1F3E0; Dashboard
        </li>
        <li id="projects">
          &#x1F4C8; Projects
        </li>
        <li id="skills">
        
          &#x1F4BB; Skills
        </li>
        <li id="contacts">
          
          &#x1F4E7; Contacts
        </li>
      </ul>
    </div>
  </aside>
<main>
  <h3>Project Table<h3>
    <br>
    <p><a href="addform">add project</a></p>
    <div class="grid-header">
        <div>Title</div>
        <div>Description</div>
        <div>Skills</div>
        <div>Actions</div>
      </div>

      <div class="grid-container">
        <div class="grid-item">id</div>
        <div class="grid-item">name</div>
        <div class="grid-item">skills</div>
        <div class="grid-item">action</div>

        <div class="grid-item">Project Portfolio Website</div>
        <div class="grid-item">A website that describes our work and skills.</div>
        <div class="grid-item">Laravel, PHP</div>
        <div class="grid-item"><a href="#">Edit</a></div>
      </div>
    </div>

      
  </main>
</body>
</html>
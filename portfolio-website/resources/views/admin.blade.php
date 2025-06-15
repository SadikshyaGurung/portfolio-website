<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="{{ asset(path:'css/style.css') }}">
</head>
<body>
   <aside>
        <div class="sidebar">
            <h2 class="home">Admin Panel</h2>
            <ul>
                
                <li id="student">Dashboard</li>
                <li id="teacher">Projects</li>
                <li id="student">Skills</li>
                <li id="teacher">Contacts</li>
            </ul>
        </div>
        </aside>
        <main>
            <h1>Dashboard</h1>
            <div class="container">
                <div class="Projectboard">
                    <h2 class="pb">Project</h2>
                    <h2 class="pb">3</h2>
                </div>
                <div class="Skillboard">
                    <h2 class="sb">Skill</h2>
                    <h2 class="sb">3</h2>
                </div>

                
            </div>
            <br>
           <div class="recent-projects">
        <h2>Recent Projects</h2>
        <br>
        <div class="grid-header">
      <div>Title</div>
      <div>Description</div>
      <div>Skills</div>
      <div>Actions</div>
    </div>

    
    <div class="grid-container">
      <div class="grid-item">Project Todo-app</div>
      <div class="grid-item">A web application for managing tasks.</div>
      <div class="grid-item">Laravel, PHP</div>
      <div class="grid-item"><a href="#">Edit</a></div>

      <div class="grid-item">Project Portfolio Website</div>
      <div class="grid-item">A website that describes our work and skills.</div>
      <div class="grid-item">Laravel, PHP</div>
      <div class="grid-item"><a href="#">Edit</a></div>
    </div>
    </div>
    </main>
</body>
</html>

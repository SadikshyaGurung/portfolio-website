<!-- resources/views/contactdash.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Dashboard</title>
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
    <h1>Contact Messages</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $message)
                <tr>
                    <td>{{ $message->id }}</td>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->description }}</td>
                    <td>
                        <!-- Actions can be added later -->
                        <a href="{{ route('message.edit', $message->id) }}">Edit</a>
                        <form action="{{ route('message.destroy', $message->id) }}" method="POST">
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

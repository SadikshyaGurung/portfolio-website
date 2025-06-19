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
        <li id="home-edit"><a href="home/edit"> &#x1F4C8; Home Page Settings</a></li>
        <li id="projects"><a href="projectdash"> &#x1F4C8; Projects</a></li>
        <li id="skills"><a href="skilldash">&#x1F4BB; Skills</a></li>

        <li id="contacts"><a href="contactdash">&#x1F4E7; Contacts</a></li>
        <li><a href="{{ route('personal') }}">👤 Personal Details</a></li>

            </ul>

            <!-- Logout button at the bottom -->
           <form method="POST" action="{{ route('logout') }}" style="display: inline;">
    @csrf
    <button type="submit" style="background:none; border:none; padding:0; cursor:pointer; color:blue; text-decoration:underline;">
        Logout
    </button>
</form>

        </div>
    </aside>

    <main>
        <h1>Contact Messages</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Grid Header -->
        <div class="grid-header">
            <div>ID</div>
            <div>Name</div>
            <div>Email</div>
            <div>Description</div>
            <div>Actions</div>
        </div>

        <!-- Grid Container -->
        <div class="grid-container">
            @foreach($messages as $message)
                <div class="grid-item">{{ $message->id }}</div>
                <div class="grid-item">{{ $message->name }}</div>
                <div class="grid-item">{{ $message->email }}</div>
                <div class="grid-item">{{ $message->description }}</div>
                <div class="grid-item">
                    <a href="{{ route('message.edit', $message->id) }}">Edit</a>
                    <form action="{{ route('message.destroy', $message->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            style="background:none;border:none;color:#d4648d;cursor:pointer;padding:0;font-weight:bold;">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </main>
</body>

</html>
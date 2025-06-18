<!-- resources/views/partials/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
</head>

<body>
    <aside>
        <div class="sidebar">
            <h2 class="home">Admin Panel</h2>
            <ul>
                <li id="dashboard"><a href="{{ route('admin') }}">🏠 Dashboard</a></li>
                <li id="home-edit"><a href="{{ route('home.edit') }}">📄 Home Page Settings</a></li>
                <li id="projects"><a href="{{ url('projectdash') }}">📂 Projects</a></li>
                <li id="skills"><a href="{{ url('skilldash') }}">💻 Skills</a></li>
                <li id="contacts"><a href="{{ url('contactdash') }}">📧 Contacts</a></li>
            </ul>

            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>
    </aside>

    <main>
        <h1>@yield('title')</h1>
        <br>
        @yield('content')
    </main>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input,
        textarea {
            width: 100%;
            max-width: 600px;
        }
    </style>
</head>

<body>
    <nav>
        <a href="{{ url('admin/homesettings') }}">🏠 Home Settings</a>
        <!-- Add other nav items here -->
    </nav>
    <hr>

    @yield('content')
</body>

</html>
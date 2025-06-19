<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Admin Dashboard')</title>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />

    <style>
        /* Base Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ffe6e6;
            color: #333;
        }

        /* Wrapper for the form */
        .form-wrapper {
            max-width: 700px;
            margin: 80px auto;
            background-color: #fff0f0;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(255, 150, 150, 0.3);
            border: 2px solid #ffc2c2;
        }

        /* Form Heading */
        .form-heading {
            font-size: 26px;
            font-weight: bold;
            text-align: center;
            color: #ff7f7f;
            margin-bottom: 30px;
        }

        /* Form Groups */
        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #d16363;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 16px;
            font-size: 15px;
            border: 1px solid #ffcaca;
            border-radius: 10px;
            background-color: #fff8f8;
            transition: border 0.3s, box-shadow 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #ff9999;
            box-shadow: 0 0 5px rgba(255, 105, 135, 0.3);
        }

        /* Submit Button */
        .submit-btn {
            background-color: #ff8a8a;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            margin-top: 10px;
        }

        .submit-btn:hover {
            background-color: #ff6f6f;
        }

        /* Success Message */
        .success {
            background-color: #e5ffe5;
            color: #3c763d;
            border: 1px solid #b2d8b2;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>

    @stack('styles')
</head>

<body>
    <aside>
        <div class="sidebar">
            <h2 class="home">Admin Panel</h2>
            <ul>
                <li id="dashboard"><a href="{{ route('admin') }}">🏠 Dashboard</a></li>
                <li id="home-edit"><a href="{{ route('home.edit') }}">📈 Home Page Settings</a></li>
                <li id="projects"><a href="{{ url('projectdash') }}">📁 Projects</a></li>
                <li id="skills"><a href="{{ url('skilldash') }}">💻 Skills</a></li>
                <li id="contacts"><a href="{{ url('contactdash') }}">📧 Contacts</a></li>
                <li><a href="{{ route('personal') }}">👤 Personal Details</a></li>
            </ul>

            <!-- Logout button at the bottom -->
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer; color: blue; text-decoration: underline;">
                    Logout
                </button>
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
